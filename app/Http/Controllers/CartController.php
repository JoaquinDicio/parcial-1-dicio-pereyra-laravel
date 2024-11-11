<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function showUserCart(Request $request)
    {
        $user = $request->user(); 

        $cart = $user->cart ?: $user->cart()->create(['completed' => false]); 
        // eloquent usa del modelo Cart-> cartItems para saber que items devolver y hace uso de la relacion
        // con la tabla 'services' 
        $cartItems = $cart->cartItems()->with('service')->get();

        $total = $cartItems->sum(function ($item) {
            return $item->service->price; // suma para el total del carrito
        });
        
        return view('users.cart', compact('cart', 'cartItems', 'total'));
    }

    public function addToCart(Request $request)
    {
        $user = $request->user();
        $cart = $user->cart ?: $user->cart()->create(['completed' => false]);
        $serviceId = $request->input('service_id');

        $cart->cartItems()->create(['service_id' => $serviceId]);

        return back()->with('success', 'Servicio agregado al carrito correctamente.');
    }

    public function deleteFromCart(){
        // TODO..
    }

    public function checkout(){
        // TODO..
    }

}

