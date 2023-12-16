<?php

namespace App\Http\Controllers;

use App\Models\ComisionVIP;
use App\Models\Compra;
use App\Models\Packages;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CompraVIPController extends Controller
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
        if (Auth::user()->SaldoActual < $request->valor) {
            return redirect()->route('tienda-VIP.index')->withErrors(['message' => 'No tienes saldo suficiente, tu saldo actual es de: '. Auth::user()->SaldoActual]);
        }

        $request->request->add(['user_id' => Auth::user()->id]);
        $data = $request->all();
        $request->validate([
            'user_id' => 'required|int',
            'package_id' => 'required|int',
            'valor' => 'required|int'
        ]);

        $paquete_anterior = Packages::find(Auth::user()->NivelActual);
        $paquete_comprado = Packages::find($request->package_id);

        Compra::create([
            'user_id' => Auth::user()->id,
            'package_id' => $request->package_id,
            'valor' => $request->valor,
            'gateway' => 'Saldos',
            'orderID_interno' => 'Saldos',
            'orderID_gateway' => 'Saldos',
            'status' => 'Complete'
        ]);


        $this->generateComisions(Auth::user(), $paquete_comprado, $paquete_anterior);

        return redirect()->route('tienda-VIP.index')->with('status', 'Has adquirido el paquete VIP '.$request->package_name.' con éxito!');
    }

    public function generateComisions($user, $paquete_comprado) {

        $usuario_promotor = User::where('nickname', $user->nickname_promoter)->first();

        if ($usuario_promotor->NivelActualVIP >= 6) {
            $paquete_inicial = Packages::FindOrFail(6);
            ComisionVIP::create([
                'user_id' => $usuario_promotor->id,
                'valor' => $paquete_inicial->price
            ]);
        }

        $usuario_transicion = User::where('id', $user->id_usuario_location)->first();
        $usuario_pago = User::where('id', $usuario_transicion->id_usuario_location)->first();

        for ($cont=2; $cont <= $paquete_comprado->nivel-5; $cont++) {

            $valor = 0;
            $paquete = Packages::Find($cont + 5);
            //dd($usuario_pago->NivelActualVIP, $cont + 6);

            if ($usuario_pago->NivelActualVIP >= $cont + 5) {
                $valor = $paquete->price;
                ComisionVIP::create([
                    'user_id' => $usuario_pago->id,
                    'valor' => $valor
                ]);
            }

            $usuario_pago = User::where('id', $usuario_pago->id_usuario_location)->first();
        }
    }

    public function generateComisionsVIP($user, $paquete_anterior, $paquete_comprado) {

        $cont2 = 0;
        $usuario_pago = User::where('id', $user->id_usuario_location)->firstOrFail();
        for ($cont=1; $cont <= $paquete_anterior->nivel; $cont++) {
            $usuario_pago = User::where('id', $usuario_pago->id_usuario_location)->firstOrFail();
            $cont2 = $cont+1;
        }

        for ($cont2; $cont2 <= $paquete_comprado->nivel; $cont2++) {
            $valor = 0;
            $paquete = Packages::FindOrFail($cont2);

            if ($usuario_pago->NivelActual >= $cont2) {

                $valor += $paquete->price;
                ComisionVIP::create([
                    'user_id' => $usuario_pago->id,
                    'valor' => $valor
                ]);
            }

            $usuario_pago = User::where('id', $usuario_pago->id_usuario_location)->firstOrFail();
        }
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
