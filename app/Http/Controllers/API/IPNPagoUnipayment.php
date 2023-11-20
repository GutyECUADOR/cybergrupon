<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\Pago;
use App\Models\RecargaSaldo;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IPNPagoUnipayment extends Controller
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
        $data = $request->all();
        $validator = Validator::make($data, [
            'invoice_id' => 'required',
        ]);

        if ($validator->fails()) {
            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/log-AsignacionEnArbol.log'),
              ])->info([$validator->errors(), $request->all()]);
            return response([
                'errors' => $validator->errors(),
                'message' => 'Uno o más campos requeridos no pasaron la validación'
            ], 400);
        }



        $IPN_invoice = $request->all();
        $IPN_invoice_id = $request->get('invoice_id');
        $compra = Compra::where('orderID_gateway', $IPN_invoice_id)->firstOrFail();
        $user_compra = User::where('id', $compra->user_id)->firstOrFail(); // Usuario de la compra
        $user_promoter = User::where('nickname', '=', $user_compra->nickname_promoter)->first(); // promotor ejem: administrador
        $ID_Partner = $user_promoter->id;

        $compra->status =  $IPN_invoice['status'];
        $compra->save();

        if ($user_compra->location || $user_compra->id_usuario_location) {
            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/log-AsignacionEnArbol.log'),
              ])->info(['El usuario ya tiene posicion asignada', $request->all()]);
            return response([
                'errors' => 'El usuario ya tiene posicion asignada',
                'message' => 'Uno o más campos requeridos no pasaron la validación'
            ], 400);
        }

        $location_free = $this->getLocation($ID_Partner);
        if($location_free->location > 3) {
            return redirect()->route('referido.create', [$request->nickname_promoter])->withErrors(['message' => 'Este patrocinador ya usó todos sus posicionamientos contacte a soporte o su patrocinador.']);
        }

        // Actualizacion en DB
        $user_compra->location = $location_free->location;
        $user_compra->id_usuario_location = $location_free->id_usuario_location;
        $user_compra->save();



        RecargaSaldo::create([
            'user_id' => $user_compra->id,
            'valor' => $compra->valor,
            'gateway' => 'UniPayment',
            'orderID_interno' => $compra->orderID_interno,
            'orderID_gateway' => $compra->orderID_gateway,
            'status' => 'Payed',
        ]);

        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/log-AsignacionEnArbol.log'),
          ])->info([$request->all(), $location_free]);
        return $request->all();
    }

    private function getLocation($ID_Partner) {
        #recorrer for de 1 a 3 y llenar array con los ID existentes
        $array_padres = [];
        $array_hijos = [];
        $cont = 1;

        #PRIMER NIVEL
        do {
            $verificacion_existe = User::where([
                ['location', '=', $cont],
                ['id_usuario_location', '=', $ID_Partner],
            ])->first();


            if ($verificacion_existe) {
                array_push($array_hijos, $verificacion_existe->id);
            }else{
                return (object) array('hijos'=> $array_hijos, 'location'=> $cont, 'id_usuario_location'=> $ID_Partner);
            }
            $cont++;
        } while ($verificacion_existe && $cont <=3);


        #2DO NIVEL

        $array_padres = $array_hijos;
        $nivel = 1;
        $array_totales =[];
        //return $array_padres;

        do {
            foreach ($array_padres as $id_padre) {
                $cont = 1;
                do {
                    $verificacion_existe = User::where([
                        ['location', '=', $cont],
                        ['id_usuario_location', '=', $id_padre],
                    ])->first();

                    if ($verificacion_existe) {
                        array_push($array_totales, $verificacion_existe->id);
                    }else{
                        return (object) array('hijos'=> $array_totales, 'location'=> $cont, 'id_usuario_location'=> $id_padre);
                    }

                    $cont++;
                } while ($verificacion_existe && $cont <=3);
            }
            $array_padres = $array_totales;
            $nivel++;
        } while ($verificacion_existe && $nivel <=4);

        return (object) array('hijos'=> $array_totales, 'location'=> $cont, 'id_usuario_location'=> $id_padre);
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
