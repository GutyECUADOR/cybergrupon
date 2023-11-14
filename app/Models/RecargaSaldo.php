<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecargaSaldo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'valor',
        'gateway',
        'orderID_interno',
        'orderID_gateway',
        'status'
    ];
}
