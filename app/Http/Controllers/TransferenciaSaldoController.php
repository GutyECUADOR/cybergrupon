<?php

namespace App\Http\Controllers;

use App\Models\TransferenciaSaldo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferenciaSaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transferencia-saldos.index');
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
            return redirect()->route('transferencia.index')->withErrors(['message' => 'No tienes saldo suficiente, tu saldo actual es de:'. Auth::user()->SaldoActual]);
        }

        $request->validate([
            'nickname' => ['exists:users,nickname','string'],
            'valor' => 'required|numeric|min:100'
        ]);

        $user_recibe = User::where('nickname', $request->nickname)->firstOrFail();
        TransferenciaSaldo::create([
            'user_envio' => Auth::user()->id,
            'user_recibe' => $user_recibe->id,
            'valor' => $request->valor,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransferenciaSaldo  $transferenciaSaldo
     * @return \Illuminate\Http\Response
     */
    public function show(TransferenciaSaldo $transferenciaSaldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransferenciaSaldo  $transferenciaSaldo
     * @return \Illuminate\Http\Response
     */
    public function edit(TransferenciaSaldo $transferenciaSaldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransferenciaSaldo  $transferenciaSaldo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransferenciaSaldo $transferenciaSaldo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransferenciaSaldo  $transferenciaSaldo
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransferenciaSaldo $transferenciaSaldo)
    {
        //
    }
}
