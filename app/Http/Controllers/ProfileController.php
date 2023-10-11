<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user();
        return view('profile.edit', compact('usuario'));
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function show(Credito $credito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credito $credito)
    {
        $request->validate([
            'nombre' => 'required|max:190',
            'cantidad' => 'required|numeric|digits_between:1,19',
            'cuotas' => 'required|numeric|digits_between:1,4',
            'interes' => 'required|numeric|between:0,999.99',
        ]);

        $credito->nombre = $request->nombre;
        $credito->cantidad = $request->cantidad;
        $credito->cuotas = $request->cuotas;
        $credito->interes = $request->interes;

        $credito->save();
        return redirect()->route('dashboard')->with('status', 'crédito: '.$request->nombre.' actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credito $credito)
    {

    }
}
