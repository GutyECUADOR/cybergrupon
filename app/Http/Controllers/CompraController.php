<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar que usuario tenga saldo

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

        if ($saldo_actual <= $request->valor) {
            return redirect()->route('tienda.index')->withErrors(['message' => 'No tienes saldo suficiente, tu saldo actual es de:'.$saldo_actual]);
        }


        $request->request->add(['user_id' => Auth::user()->id]);
        $data = $request->all();
        $request->validate([
            'user_id' => 'required|int',
            'package_id' => 'required|int',
            'valor' => 'required|int'
        ]);

        Compra::create($data);
        return redirect()->route('tienda.index')->with('status', 'Has adquirido el paquete '.$request->package_name.' con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
