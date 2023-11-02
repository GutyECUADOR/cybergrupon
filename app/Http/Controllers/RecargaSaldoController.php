<?php

namespace App\Http\Controllers;

use App\Models\RecargaSaldo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecargaSaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recarga-saldo.index');
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
    public function store(Request $request) {
        $request->request->add(['user_id' => Auth::user()->id]);
        $data = $request->all();
        $request->validate([
            'valor' => 'required|numeric|min:200',
        ]);

        RecargaSaldo::create($data);
        return redirect()->back()->with('status', 'Se registro la recarga correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecargaSaldo  $recargaSaldo
     * @return \Illuminate\Http\Response
     */
    public function show(RecargaSaldo $recargaSaldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecargaSaldo  $recargaSaldo
     * @return \Illuminate\Http\Response
     */
    public function edit(RecargaSaldo $recargaSaldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecargaSaldo  $recargaSaldo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecargaSaldo $recargaSaldo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecargaSaldo  $recargaSaldo
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecargaSaldo $recargaSaldo)
    {
        //
    }
}
