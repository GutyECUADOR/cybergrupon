<?php

namespace App\Http\Controllers;

use App\Models\ComisionVIP;
use App\Models\Compra;
use App\Models\Packages;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isNull;

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
        if (Auth::user()->SaldoTotal < $request->valor) {
            return redirect()->route('tienda-VIP.index')->withErrors(['message' => 'No tienes saldo suficiente, tu saldo actual es de: '. Auth::user()->SaldoTotal]);
        }

        $request->request->add(['user_id' => Auth::user()->id]);
        $data = $request->all();
        $request->validate([
            'user_id' => 'required|int',
            'package_id' => 'required|int',
            'valor' => 'required|int'
        ]);

         // Validar que usuario tenga saldo
         if (Auth::user()->SaldoTotal < $request->valor) {
            return redirect()->route('tienda-VIP.index')->withErrors(['message' => 'No tienes saldo suficiente, tu saldo actual es de: '. Auth::user()->SaldoTotal]);
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

        $paquete_anteriorVIP = Packages::find(Auth::user()->NivelActualVIP);
        $paquete_comprado = Packages::find($request->package_id);

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

        if (Auth::user()->ReferidosUltimos5meses >= 3) {
            $this->generateComisions(Auth::user(), $paquete_comprado, $paquete_anteriorVIP);
        }

        return redirect()->route('tienda-VIP.index')->with('status', 'Has adquirido el paquete VIP '.$request->package_name.' con éxito!');
    }

    public function generateComisions($user, $paquete_comprado, $paquete_anteriorVIP) {

        $cont2 = 0;
        if ($paquete_anteriorVIP) {
            $nivel = $paquete_anteriorVIP->nivel;
        }else{
            $nivel = 0;
        }

        //Comprobar que el patrocinador tenga un paquete mayor o igual al que compra el usuario
        // Pago al patrocinador
        if ($nivel < 1) {
            $usuario_promotor = User::where('nickname', $user->nickname_promoter)->first(); // Para crearle la comision al promotor

            if ($usuario_promotor->NivelActualVIP >= 1) {
                $paquete_inicial = Packages::FindOrFail(6); // Siempre al patrocinador pagar de comision el valor de un paquete inicial VIP

                if ($usuario_promotor->ReferidosUltimos5meses >= 3) {
                    ComisionVIP::create([
                        'user_id' => $usuario_promotor->id,
                        'valor' => $paquete_inicial->price
                    ]);
                }
            }
        }

        // Pago a los de arriba

        // Subir hacia arriba segun el nivel del paquete comprado, si compra nivel 2VIP subir y pagar 2 arriba de el
        $usuario_transicion = User::where('id', $user->id_usuario_location)->first(); // El que esta arriba del usuario de compro
        $usuario_pago = User::where('id', $usuario_transicion->id_usuario_location)->first();

        // Recorrer el puntero hacia arriba segun el nivel que compro

        for ($cont=2; $cont <= $nivel; $cont++) {
            $usuario_pago = User::where('id', $usuario_pago->id_usuario_location)->firstOrFail();
        }
        $cont2 = $cont;

       /* dd($cont2, $paquete_comprado->nivel); */

       if ($paquete_comprado->nivel > 6) {

           for ($cont2; $cont2 <= $paquete_comprado->nivel -5; $cont2++) {

               $valor = 0;
               $paquete = Packages::Find($cont2 + 5);

               //dd($cont2, $paquete_comprado->nivel -5, $usuario_pago->NivelActualVIP);

               if ($usuario_pago->NivelActualVIP >= $cont2) {
                   $valor = $paquete->price;
                   if ($usuario_promotor->ReferidosUltimos5meses >= 3) {
                        ComisionVIP::create([
                            'user_id' => $usuario_pago->id,
                            'valor' => $valor,
                            'contador' => $cont2
                        ]);
                    }
               }

               $usuario_pago = User::where('id', $usuario_pago->id_usuario_location)->first();
           }
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

                if ($usuario_pago->ReferidosUltimos5meses >= 3) {
                    ComisionVIP::create([
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
