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
        'imagen_recibo',
        'link_publicidad',
        'link_redireccion',
        'link_publicidad2',
        'link_redireccion2',
        'link_publicidad3',
        'link_redireccion3',
        'link_publicidad4',
        'link_redireccion4',
        'link_publicidad5',
        'link_redireccion5'
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

    public function getGananciasTotalesAttribute() {
        $saldo_comisiones = DB::table('comisions')
            ->where('user_id', $this->id)
            ->selectRaw('user_id, sum(valor) as valor')
            ->groupBy('user_id')
            ->get();

        $saldo_comisionesVIP = DB::table('comisions200')
            ->where('user_id', $this->id)
            ->selectRaw('user_id, sum(valor) as valor')
            ->groupBy('user_id')
            ->get();

        $movimientos = $saldo_comisiones->merge($saldo_comisionesVIP);

        $saldo_comisiones = 0;
        foreach ($movimientos as $movimiento ) {
            $saldo_comisiones += $movimiento->valor;
        }

        return $saldo_comisiones;


    }

    public function getSaldoActualAttribute () {
        $saldo_recargas = DB::table('recarga_saldos')
        ->where([['user_id', $this->id], ['status', 'Complete']])
        ->selectRaw('user_id, sum(valor) as valor')
        ->groupBy('user_id')
        ->get();
        
        //dd($saldo_recargas);

        $saldo_transferencias_salida = DB::table('transferencia_saldos')
        ->where([['user_envio', $this->id], ['isVIP', 0]])
        ->selectRaw('user_envio as user_id, -sum(valor) as valor')
        ->groupBy('user_id')
        ->get();
        
        //dd($saldo_transferencias_salida);

        $saldo_transferencias_recibe = DB::table('transferencia_saldos')
        ->where([['user_recibe', $this->id], ['isVIP', 0]])
        ->selectRaw('user_recibe as user_id, sum(valor) as valor')
        ->groupBy('user_id')
        ->get();
        
        //dd($saldo_transferencias_recibe);


        $saldo_compras = DB::table('compras')
        ->where([['user_id', $this->id], ['status', 'Complete']])
        ->where('gateway', '!=' ,'SaldosVIP')
        ->selectRaw('user_id, -sum(valor) as valor')
        ->groupBy('user_id')
        ->get();
        
        //dd($saldo_compras);

        $saldo_pagos = DB::table('pagos')
        ->where([['user_id', $this->id], ['isVIP', 0]])
        ->selectRaw('user_id, -sum(((valor + 2) * 5)/95 + (valor + 2)) as valor')
        ->groupBy('user_id')
        ->get();

        $saldo_comisiones = DB::table('comisions')
        ->where('user_id', $this->id)
        ->selectRaw('user_id, sum(valor) as valor')
        ->groupBy('user_id')
        ->get();
        

        $movimientos = $saldo_recargas
                        ->merge($saldo_compras)
                        ->merge($saldo_transferencias_salida)
                        ->merge($saldo_transferencias_recibe)
                        ->merge($saldo_pagos)
                        ->merge($saldo_comisiones);


        $saldo_actual = 0;
        foreach ($movimientos as $movimiento ) {
            $saldo_actual += $movimiento->valor;
        }

        /*
        if ($saldo_actual < 0) {
            return 0;
        }
        */

        return $saldo_actual;
    }

    public function getSaldoVIPActualAttribute () {
        /* $saldo_recargas = DB::table('recarga_saldos')
        ->where([['user_id', $this->id], ['status', 'Complete']])
        ->selectRaw('user_id, sum(valor) as valor')
        ->groupBy('user_id')
        ->get(); */

        $saldo_transferencias_salida = DB::table('transferencia_saldos')
        ->where([['user_envio', $this->id], ['isVIP', 1]])
        ->selectRaw('user_envio as user_id, -sum(valor) as valor')
        ->groupBy('user_id')
        ->get();

        $saldo_transferencias_recibe = DB::table('transferencia_saldos')
        ->where([['user_recibe', $this->id], ['isVIP', 1]])
        ->selectRaw('user_recibe as user_id, sum(valor) as valor')
        ->groupBy('user_id')
        ->get();

        $saldo_compras = DB::table('compras')
        ->where([['user_id', $this->id], ['status', 'Complete'], ['gateway', 'SaldosVIP']])
        ->selectRaw('user_id, -sum(valor) as valor')
        ->groupBy('user_id')
        ->get();

        $saldo_pagos = DB::table('pagos')
        ->where([['user_id', $this->id], ['isVIP', 1]])
        ->selectRaw('user_id, -sum(((valor + 2) * 5)/95 + (valor + 2)) as valor')
        ->groupBy('user_id')
        ->get();

        $saldo_comisiones = DB::table('comisions200')
        ->where('user_id', $this->id)
        ->selectRaw('user_id, sum(valor) as valor')
        ->groupBy('user_id')
        ->get();

        $movimientos = $saldo_compras
                        ->merge($saldo_transferencias_salida)
                        ->merge($saldo_transferencias_recibe)
                        ->merge($saldo_pagos)
                        ->merge($saldo_comisiones);



        $saldo_actual = 0;
        foreach ($movimientos as $movimiento ) {
            $saldo_actual += $movimiento->valor;
        }
        
        /*
        if ($saldo_actual < 0) {
            return 0;
        }
        */

        return $saldo_actual;
    }

    public function getSaldoTotalAttribute () {

        $saldo_recargas = DB::table('recarga_saldos')
        ->where([['user_id', $this->id], ['status', 'Complete']])
        ->selectRaw('user_id, sum(valor) as valor')
        ->groupBy('user_id')
        ->get();

        $saldo_transferencias_salida = DB::table('transferencia_saldos')
        ->where('user_envio', $this->id)
        ->selectRaw('user_envio as user_id, -sum(valor) as valor')
        ->groupBy('user_id')
        ->get();

        $saldo_transferencias_recibe = DB::table('transferencia_saldos')
        ->where('user_recibe', $this->id)
        ->selectRaw('user_recibe as user_id, sum(valor) as valor')
        ->groupBy('user_id')
        ->get();

        $saldo_compras = DB::table('compras')
        ->where([['user_id', $this->id], ['status', 'Complete']])
        ->selectRaw('user_id, -sum(valor) as valor')
        ->groupBy('user_id')
        ->get();

        $saldo_pagos = DB::table('pagos')
        ->where([['user_id', $this->id]])
        ->selectRaw('user_id, -sum(((valor + 2) * 5)/95 + (valor + 2)) as valor')
        ->groupBy('user_id')
        ->get();

        $saldo_comisiones = DB::table('comisions')
        ->where('user_id', $this->id)
        ->selectRaw('user_id, sum(valor) as valor')
        ->groupBy('user_id')
        ->get();

        $saldo_comisionesVIP = DB::table('comisions200')
        ->where('user_id', $this->id)
        ->selectRaw('user_id, sum(valor) as valor')
        ->groupBy('user_id')
        ->get();

        $movimientos = $saldo_recargas
                        ->merge($saldo_compras)
                        ->merge($saldo_transferencias_salida)
                        ->merge($saldo_transferencias_recibe)
                        ->merge($saldo_pagos)
                        ->merge($saldo_comisiones)
                        ->merge($saldo_comisionesVIP);

        $saldo_actual = 0;
        foreach ($movimientos as $movimiento ) {
            $saldo_actual += $movimiento->valor;
        }

        /*
        if ($saldo_actual < 0) {
            return 0;
        }
        */

        return $saldo_actual;
    }

    public function getMovimientosAttribute () {
        $saldo_recargas = DB::table('recarga_saldos')
        ->where([['user_id', $this->id], ['status', 'Complete']])
        ->selectRaw('user_id, valor, created_at, status, "Recarga de Saldo" as tipoMovimiento ');

        $saldo_transferencias_salida = DB::table('transferencia_saldos')
        ->where('user_envio', $this->id)
        ->selectRaw('user_envio as user_id, -(valor) as valor, created_at, "Completo" as status, "Transferencia de Saldo" as tipoMovimiento ');

        $saldo_transferencias_recibe = DB::table('transferencia_saldos')
        ->where('user_recibe', $this->id)
        ->selectRaw('user_recibe as user_id, valor, created_at, "Completo" as status, "Transferencia de Saldo" as tipoMovimiento ');

        $saldo_comisiones = DB::table('comisions')
        ->where('user_id', $this->id)
        ->selectRaw('user_id, valor, created_at, "Completo" as status, "Comision" as tipoMovimiento ');

        $saldo_comisionesVIP = DB::table('comisions200')
        ->where('user_id', $this->id)
        ->selectRaw('user_id, valor, created_at, "Completo" as status, "Comision" as tipoMovimiento ');

        $saldo_pagos = DB::table('pagos')
        ->where('user_id', $this->id)
        ->selectRaw('user_id, -(((valor + 2) * 5)/95 + (valor + 2)) as valor, created_at, status, "Pago" as tipoMovimiento ');


        $saldo_compras = DB::table('compras')
        ->where([['user_id', $this->id], ['status', 'Complete']])
        ->selectRaw('user_id, -(valor) as valor, created_at, status, "Compra" as tipoMovimiento ')
        ->union($saldo_recargas)
        ->union($saldo_transferencias_salida)
        ->union($saldo_transferencias_recibe)
        ->union($saldo_pagos)
        ->union($saldo_comisiones)
        ->union($saldo_comisionesVIP)
        ->orderByDesc('created_at')
        ->limit(100)
        ->get();


        return $saldo_compras;
    }

    public function getNivelActualAttribute() {
        $package_mayor = Compra::where([['user_id', $this->id], ['status', 'Complete'], ['package_id', '<=', '5']])->max('package_id') ;
        if (!$package_mayor) {
            return 0;
        }

        return $package_mayor;
    }

    public function getNivelActualVIPAttribute() {
        $package_mayor = Compra::where([['user_id', $this->id], ['status', 'Complete'], ['package_id', '>=', '6']])->max('package_id') ;
        if (!$package_mayor) {
            return 0;
        }
        return $package_mayor - 5;
    }


    public function getReferidosAttribute() {
        $cantidadReferidos = User::where('nickname_promoter', Auth::user()->nickname)->count('nickname_promoter') ;
        return $cantidadReferidos;
    }
}
