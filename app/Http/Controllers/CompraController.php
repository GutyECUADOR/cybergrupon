<?php

namespace App\Http\Controllers;

use App\Models\Comision;
use App\Models\Compra;
use App\Models\Packages;
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
        $request->request->add(['user_id' => Auth::user()->id]);
        $data = $request->all();
        $request->validate([
            'user_id' => 'required|int',
            'package_id' => 'required|int',
            'valor' => 'required|int'
        ]);

        // Validar que usuario tenga saldo
        if (Auth::user()->SaldoTotal < $request->valor) {
            return redirect()->route('tienda.index')->withErrors(['message' => 'No tienes saldo suficiente, tu saldo actual es de: '. Auth::user()->SaldoTotal]);
        }

        // Verifica que usuario tenga saldo total suficiente
        if (Auth::user()->SaldoTotal < $request->valor) {
            return redirect()->route('recargasaldo.index')->withErrors(['message' => 'No tienes saldo suficiente, tu saldo actual es de:'. Auth::user()->SaldoTotal]);
        }

        // Verifica que el total de paquete haya sido asignado
        if ($request->pago_saldo + $request->pago_saldoVIP != $request->valor) {
            return redirect()->back()->withErrors(['message' => 'La suma de los pagos debe coincidir con el valor del paquete seleccionado'])->withInput();
        }

        // Verifica que usuario tenga saldo VIP suficiente para pagar el valor asignado para comprar paquete
        if (Auth::user()->SaldoVIPActual < $request->pago_saldoVIP) {
            return redirect()->back()->withErrors(['message' => 'No tienes saldo VIP suficiente, tu saldo VIP actual es de: '. Auth::user()->SaldoVIPActual. ' recarga saldo o realiza la compra con saldo normal'])->withInput();
        }

        // Verifica que usuario tenga saldo normal suficiente para pagar el valor asignado para comprar paquete
        if (Auth::user()->SaldoActual < $request->pago_saldo) {
            return redirect()->back()->withErrors(['message' => 'No tienes saldo normal suficiente, tu saldo normal actual es de: '. Auth::user()->SaldoActual. ' recarga saldo o realiza la compra con saldo VIP'])->withInput();
        }

        $paquete_anterior = Packages::findOrFail(Auth::user()->NivelActual);
        $paquete_comprado = Packages::findOrFail($request->package_id);

        if ($request->pago_saldoVIP > 0) {
            Compra::create([
                'user_id' => Auth::user()->id,
                'package_id' => $request->package_id,
                'valor' => $request->pago_saldoVIP,
                'gateway' => 'SaldosVIP',
                'orderID_interno' => 'Saldos',
                'orderID_gateway' => 'Saldos',
                'status' => 'Complete'
            ]);
        }

        if ($request->pago_saldo > 0) {
            Compra::create([
                'user_id' => Auth::user()->id,
                'package_id' => $request->package_id,
                'valor' => $request->pago_saldo,
                'gateway' => 'Saldos',
                'orderID_interno' => 'Saldos',
                'orderID_gateway' => 'Saldos',
                'status' => 'Complete'
            ]);
        }

        $this->generateComisions(Auth::user(), $paquete_anterior, $paquete_comprado);

        return redirect()->route('tienda.index')->with('status', 'Has adquirido el paquete '.$request->package_name.' con éxito!');
    }

    public function generateComisions($user, $paquete_anterior, $paquete_comprado) {

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

                if ($usuario_pago->ReferidosUltimos5meses >= 3) {
                    Comision::create([
                        'user_id' => $usuario_pago->id,
                        'valor' => $valor
                    ]);
                }

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
