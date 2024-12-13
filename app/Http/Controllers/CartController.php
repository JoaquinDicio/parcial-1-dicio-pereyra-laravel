<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CartItem;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

class CartController extends Controller
{
    public function showUserCart(Request $request)
    {
        $user = $request->user(); 

        $cart = $user->cart ?: $user->cart()->create(['completed' => false]); 
        // eloquent usa del modelo Cart-> cartItems para saber que items devolver y hace uso de la relacion
        // con la tabla 'services' 
        $cartItems = $cart->cartItems()->with('service')->get();

        if ($cartItems->isEmpty()) {
            return view('users.cart', [
                'groupedItems' => [],
                'total' => 0,
                'preference' => null,
            ]);
        }

        $groupedItems = [];
        foreach ($cartItems as $item) {
            $serviceId = $item->service_id;
            if (!isset($groupedItems[$serviceId])) {
                $groupedItems[$serviceId] = [
                    'service' => $item->service,
                    'quantity' => 0,
                    'total_price' => 0,
                    'item_id' => $item->id
                ];
            }
            $groupedItems[$serviceId]['quantity'] += 1;
            $groupedItems[$serviceId]['total_price'] += $item->service->price;
        }

        $total = array_sum(array_column($groupedItems, 'total_price'));
        session(['cart_total'=>$total]); //lo guardo global para poder usarlo en el checkout

        //integracion con mercado pago

        MercadoPagoConfig::setAccessToken(env('MERCADO_PAGO_ACCESS_KEY'));

        $client = new PreferenceClient();

        try {
            $itemsArray = [];
        
            foreach ($cartItems as $item) {
                $itemsArray[] = [
                    "id" => $item->id,
                    "title" => $item->service->name,
                    "quantity" => 1,
                    "unit_price" => intval($item->service->price),
                ];
            }
        
            $preference = $client->create([
                "items" => $itemsArray,
                "statement_descriptor" => "HostEngine",
                "external_reference" => "CDP001",
                "back_urls" => [
                    "success" => route('payment.success'), // cuando el pago es exitoso
                    "failure" => route('payment.failed'), // cuando no se pudo completar el pago
                ],
                "auto_return" => "approved",
            ]);
        
            if (!$preference) {
                throw new \Exception("No se pudo crear la preferencia de Mercado Pago");
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
        

        return view('users.cart', compact('groupedItems','total', 'preference'));
    }
    public function paymentFailed(Request $request)
    {
        return redirect()->route('cart')->with('error', value: 'No se pudo procesar el pago, intentalo nuevamente.');
    }
    public function paymentSuccess(Request $request)
    {
       //consulta para obtener los items del cart
       $user = auth()->user();
       $cartId = auth()->user()->cart->id;
       $cartItems = CartItem::where('cart_id', $cartId)->get();

       //suscripcion y pago para cada item del cart

       foreach ($cartItems as $item){
           
           $subscription = $user->subscriptions()->create([
               'service_id' => $item->service_id,
               'contract_date' => now(),
           ]);

           $subscription->payments()->create([
               'amount' => session('cart_total'),
               'card_last_four' => substr($request->card_number, -4), 
               'payment_date' => now(),
           ]);
       }

       $user->cart->cartItems()->delete();
    
        // redirigir a la página de inicio con mensaje de éxito
        return redirect()->route('users.home')->with('success', 'Tu pago fue exitoso, ya estás suscrito a los servicios seleccionados.');
    }
    public function addToCart(Request $request)
    {
        $user = $request->user();
        $cart = $user->cart ?: $user->cart()->create(['completed' => false]);
        $serviceId = $request->input('service_id');

        $cart->cartItems()->create(['service_id' => $serviceId]);

        return back()->with('success', 'Servicio agregado al carrito correctamente.');
    }
    public function deleteFromCart($cart_item_id)
    {
        $item = CartItem::find($cart_item_id);

        if($item){
            $item->delete();
            return back()->with('success','Servicio eliminado del carrito');
        };
    }
}