<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComisionVIP extends Model
{
    use HasFactory;

    protected $table = 'comisions200';

    protected $fillable = [
        'user_id',
        'valor',
        'contador'
    ];
}
