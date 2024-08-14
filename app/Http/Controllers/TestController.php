<?php

namespace App\Http\Controllers;

use App\Models\Comision;
use App\Models\Packages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(386);
        $package = Packages::findOrFail(3);

        if (Auth::user()->ReferidosUltimos5meses >= 3) {
            $this->generateComisions($user, $package);
        }
        return [$user, $package];
    }

    public function generateComisions($user, $paquete_comprado) {

        $usuario_pago = User::where('id', $user->id_usuario_location)->firstOrFail();
        for ($cont=1; $cont <= $paquete_comprado->nivel; $cont++) {

            $valor = 0;
            $paquete = Packages::FindOrFail($cont);

            if ($usuario_pago->NivelActual >= $cont) {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
