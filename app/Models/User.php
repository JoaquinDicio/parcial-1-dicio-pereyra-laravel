<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class User extends Authenticatable
{
    use HasFactory;

    public function subscriptions()
    {
        return $this->hasMany(Suscription::class);
    }

    //esto sirve para poder obtener el carrito 'completed:false' del usuario
    public function cart()
    {
        return $this->hasOne(Cart::class)->where('completed', false);
    }
}
