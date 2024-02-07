<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;
use App\Models\Packages;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Obtener el listado de planes mayores al que ya tiene.
        $package_mayor = Compra::where('user_id', Auth::user()->id)
                        ->where('package_id', '<=', '5')
                        ->where('status', 'Complete')
                        ->max('package_id');
        if (!$package_mayor) {
            $package_mayor = 0;
        }
        $packages = Packages::where('nivel', '>', $package_mayor)
                            ->where('tipo', 'normal')
                            ->get();

        $linksPublicidad = AdvertisingHelperController::getlinksPublicidad();
        return view('tienda.index', compact('packages','linksPublicidad'));
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
