<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Suscription;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'suscription_id',
        'amount',
        'card_last_four',
        'payment_date',
    ];

    public function suscription()
    {
        return $this->belongsTo(Suscription::class);
    }
}

