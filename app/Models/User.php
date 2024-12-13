<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * Atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'name',        
        'email',       
        'password',    
        'role_id',     
    ];

    /**
     * Relación con las suscripciones.
     */
    public function subscriptions()
    {
        return $this->hasMany(Suscription::class);
    }

    /**
     * Relación con el carrito activo (completed = false).
     */
    public function cart()
    {
        return $this->hasOne(Cart::class)->where('completed', false);
    }
}
