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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_usuario)
    {
        $usuario = User::find($id_usuario);

        $request->validate([
            'phone' => 'required|string|max:25',
            'link_publicidad' => 'required|string|max:190',
            'link_redireccion' => 'required|string|max:190',
            'link_publicidad2' => 'string|max:190',
            'link_redireccion2' => 'string|max:190',
            'link_publicidad3' => 'string|max:190',
            'link_redireccion3' => 'string|max:190',
            'link_publicidad4' => 'string|max:190',
            'link_redireccion4' => 'string|max:190',
            'link_publicidad5' => 'string|max:190',
            'link_redireccion5' => 'string|max:190',
        ]);

        $usuario->phone = $request->phone;
        $usuario->link_publicidad = $request->link_publicidad;
        $usuario->link_redireccion = $request->link_redireccion;
        $usuario->link_publicidad2 = $request->link_publicidad2;
        $usuario->link_redireccion2 = $request->link_redireccion2;
        $usuario->link_publicidad3 = $request->link_publicidad3;
        $usuario->link_redireccion3 = $request->link_redireccion3;
        $usuario->link_publicidad4 = $request->link_publicidad4;
        $usuario->link_redireccion4 = $request->link_redireccion4;
        $usuario->link_publicidad5 = $request->link_publicidad5;
        $usuario->link_redireccion5 = $request->link_redireccion5;

        $usuario->save();
        return redirect()->route('profile.index')->with('status', 'Perfil actualizado con éxito!');
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
