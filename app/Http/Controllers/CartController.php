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

    public function checkout(){
        // TODO..
    }

}

