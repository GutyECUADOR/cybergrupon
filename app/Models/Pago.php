<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'wallet',
        'gateway',
        'fecha_pago',
        'valor',
        'isVIP',
        'orderID_gateway'
    ];
}
