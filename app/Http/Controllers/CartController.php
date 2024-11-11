<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;

class CartController extends Controller
{
    public function showUserCart(Request $request)
    {
        $user = $request->user(); 

        $cart = $user->cart ?: $user->cart()->create(['completed' => false]); 
        // eloquent usa del modelo Cart-> cartItems para saber que items devolver y hace uso de la relacion
        // con la tabla 'services' 
        $cartItems = $cart->cartItems()->with('service')->get();

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

        return view('users.cart', compact('groupedItems', 'total'));
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

    public function showCheckout(){
        return view('users.checkout');
    }

    public function checkout(Request $request){

        $messages = [
            'card_number.required' => 'El numero de la tarjeta es obligatorio.',
            'card_number.numeric' => 'Este numero es invalido',
            'card_number.digits' => 'El numero de tarjeta debe tener 16 digitos.',
            'expiry_date.required' => 'La fecha de vencimiento es obligatoria.',
            'expiry_date.date_format' => 'El formato de la fecha debe ser MM/AA.',
            'cvv.required' => 'El CVV es obligatorio.',
            'cvv.numeric' => 'El CVV debe ser un numero.',
            'cvv.digits' => 'El CVV debe tener 3 digitos.',
        ];
    
        $request->validate([
            'card_number' => 'required|numeric|digits:16',
            'expiry_date' => ['required', 'date_format:m/y', function ($attribute, $value, $fail) {
                // esta funcion es para ver que no haya expirado la tarjeta
                $currentDate = new \DateTime();
                $expiryDate = \DateTime::createFromFormat('m/y', $value);
                if ($expiryDate < $currentDate) {
                    $fail('Tu tarjeta esta vencida');
                }
            }],
            'cvv' => 'required|numeric|digits:3',
        ], $messages);

        //continua despues de las validaciones
    }

}

