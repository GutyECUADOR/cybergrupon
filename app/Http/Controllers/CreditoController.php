<?php

namespace App\Http\Controllers;

use App\Models\Credito;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class CreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $linksPublicidad1 = User::select('users.id','users.link_publicidad', 'users.link_redireccion', 'compras.package_id')
        ->join('compras', 'users.id', '=', 'compras.user_id')
        ->whereNotNull('users.link_publicidad');

        $linksPublicidad2 = User::select('users.id','users.link_publicidad2 as link_publicidad', 'users.link_redireccion2 as link_redireccion', 'compras.package_id')
        ->join('compras', 'users.id', '=', 'compras.user_id')
        ->whereNotNull('users.link_publicidad2');

        $linksPublicidad3 = User::select('users.id','users.link_publicidad3 as link_publicidad', 'users.link_redireccion3 as link_redireccion', 'compras.package_id')
        ->whereNotNull('users.link_publicidad3')
        ->join('compras', 'users.id', '=', 'compras.user_id');

        $linksPublicidad4 = User::select('users.id','users.link_publicidad4 as link_publicidad', 'users.link_redireccion4 as link_redireccion', 'compras.package_id')
        ->whereNotNull('users.link_publicidad4')
        ->join('compras', 'users.id', '=', 'compras.user_id');

        $linksPublicidad = User::select('users.id','users.link_publicidad5 as link_publicidad', 'users.link_redireccion5 as link_redireccion', 'compras.package_id')
        ->join('compras', 'users.id', '=', 'compras.user_id')
        ->whereNotNull('users.link_publicidad5')
        ->unionAll($linksPublicidad1)
        ->unionAll($linksPublicidad2)
        ->unionAll($linksPublicidad3)
        ->unionAll($linksPublicidad4)
        ->inRandomOrder()->limit(4)
        ->get();
        return view('dashboard', compact('linksPublicidad'));
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
            'nombre' => 'required|max:190',
            'cantidad' => 'required|numeric|digits_between:1,19',
            'cuotas' => 'required|numeric|digits_between:1,4',
            'interes' => 'required|numeric|between:0,999.99',
        ]);

        Credito::create($data);
        return redirect()->route('creditos.index')->with('status', 'El crédito se registró '.$request->name.' con éxito!');
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
     * @param  \App\Models\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function edit(Credito $credito)
    {
        return view('credito.edit', compact('credito'));
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
        $credito->delete();
        return redirect()->back()->with('status', 'Crédito '.$credito->nombre.' se ha eliminado con éxito!');
    }
}
