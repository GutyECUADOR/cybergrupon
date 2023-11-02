<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nickname',
        'location',
        'id_usuario_location',
        'is_payed',
        'package_id',
        'nickname_promoter',
        'email',
        'phone',
        'password',
        'imagen_recibo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getSaldoActualAttribute () {
        $saldo_recargas = DB::table('recarga_saldos')
        ->where('user_id', Auth::user()->id)
        ->selectRaw('user_id, sum(valor) as valor')
        ->groupBy('user_id')
        ->get();


        $saldo_compras = DB::table('compras')
        ->where('user_id', Auth::user()->id)
        ->selectRaw('user_id, -sum(valor) as valor')
        ->groupBy('user_id')
        ->get();

        $movimientos = $saldo_recargas->merge($saldo_compras);

        $saldo_actual = 0;
        foreach ($movimientos as $movimiento ) {
            $saldo_actual += $movimiento->valor;
        }

        return $saldo_actual;
    }

    public function getMovimientosAttribute () {
        $saldo_recargas = DB::table('recarga_saldos')
        ->where('user_id', Auth::user()->id)
        ->selectRaw('user_id, valor, created_at, "Recarga de Saldo" as tipoMovimiento ');



        $saldo_compras = DB::table('compras')
        ->where('user_id', Auth::user()->id)
        ->selectRaw('user_id, -(valor) as valor, created_at, "Compra" as tipoMovimiento ')
        ->union($saldo_recargas)
        ->orderByDesc('created_at')
        ->limit(100)
        ->get();

        //$movimientos = $saldo_recargas->merge($saldo_compras);

        return $saldo_compras;
    }
}
