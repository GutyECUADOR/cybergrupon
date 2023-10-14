<?php

namespace App\Http\Controllers;

use App\Models\Red;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posicion2_1 =  DB::table('users')
            ->where('id_usuario_location', Auth::user()->id)
            ->where('location', 1)
            ->first();

        $posicion2_2 =  DB::table('users')
            ->where('id_usuario_location', Auth::user()->id)
            ->where('location', 2)
            ->first();

        $posicion2_3 =  DB::table('users')
            ->where('id_usuario_location', Auth::user()->id)
            ->where('location', 3)
            ->first();


        // Tercer nivel
        $posicion3_1 =  DB::table('users')
            ->where('id_usuario_location',  $posicion2_1->id)
            ->where('location', 1)
            ->first();

        $posicion3_2 =  DB::table('users')
            ->where('id_usuario_location',  $posicion2_1->id)
            ->where('location', 2)
            ->first();

        $posicion3_3 =  DB::table('users')
            ->where('id_usuario_location',  $posicion2_1->id)
            ->where('location', 3)
            ->first();


        $posicion3_4 =  DB::table('users')
            ->where('id_usuario_location',  $posicion2_2->id)
            ->where('location', 1)
            ->first();

        $posicion3_5 =  DB::table('users')
            ->where('id_usuario_location',  $posicion2_2->id)
            ->where('location', 2)
            ->first();

        $posicion3_6 =  DB::table('users')
            ->where('id_usuario_location',  $posicion2_2->id)
            ->where('location', 3)
            ->first();

        $posicion3_7 =  DB::table('users')
            ->where('id_usuario_location',  $posicion2_3->id)
            ->where('location', 1)
            ->first();

        $posicion3_8 =  DB::table('users')
            ->where('id_usuario_location',  $posicion2_3->id)
            ->where('location', 2)
            ->first();

        $posicion3_9 =  DB::table('users')
            ->where('id_usuario_location',  $posicion2_3->id)
            ->where('location', 3)
            ->first();



        return view('red.index', compact('posicion2_1', 'posicion2_2', 'posicion2_3', 'posicion3_1', 'posicion3_2', 'posicion3_3', 'posicion3_4', 'posicion3_5', 'posicion3_6', 'posicion3_7', 'posicion3_8', 'posicion3_9'));
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
     * @param  \App\Models\Red  $red
     * @return \Illuminate\Http\Response
     */
    public function show(Red $red)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Red  $red
     * @return \Illuminate\Http\Response
     */
    public function edit(Red $red)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Red  $red
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Red $red)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Red  $red
     * @return \Illuminate\Http\Response
     */
    public function destroy(Red $red)
    {
        //
    }
}
