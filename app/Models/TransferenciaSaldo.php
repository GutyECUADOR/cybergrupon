<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferenciaSaldo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_envio',
        'user_recibe',
        'valor',
        'isVIP'
    ];

}
