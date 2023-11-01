<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterReferido extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nickname)
    {
        return view('referido.register', compact('nickname'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        //dd($request->all());
        $custom_messages = [
            'nickname_promoter.exists' => 'El nick o código del promotor no existe, indique un código correcto.',
            'id_usuario_location.required' => 'Esta ubicación no esta habilitada, selecciona una ubicación directa a otro usuario.'
        ];

        # Obtener el ID del partner promotor
        $ID_Partner = User::where('nickname', '=', $request->nickname_promoter)->first();
        $ID_Partner = $ID_Partner->id; //administrador

        $locations = $this->getLocation($ID_Partner);

        dd($locations);


        $location = '';

        $id_usuario_location = '';


        $request->validate([
            'nickname' => ['required', 'string', 'max:191', 'unique:users'],
            'nickname_promoter' => ['exists:users,nickname', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'phone' => ['required', 'string', 'max:15'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], $custom_messages);

        $user = User::create([
            'nickname' => $request->nickname,
            'nicklocationname' => $request->location,
            'location' => $location,
            'id_usuario_location' => $id_usuario_location,
            'nickname_promoter' => $request->nickname_promoter,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('red.index')->with('status', 'Se ha registrado con éxito');
    }

    private function getLocation($ID_Partner) {
        #recorrer for de 1 a 3 y llenar array con los ID existentes
        $array_padres = [];
        $array_hijos = [];
        $cont = 1;


        do {
            $verificacion_existe = User::where([
                ['location', '=', $cont],
                ['id_usuario_location', '=', $ID_Partner],
            ])->first();


            if ($verificacion_existe) {
                array_push($array_hijos, $verificacion_existe->id);
            }
            $cont++;
        } while ($verificacion_existe && $cont <=3);


        $array_padres = $array_hijos;
        $array_hijos = [];
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
                        return $array_totales;
                    }

                    $cont++;
                } while ($verificacion_existe && $cont <=3);
            }
            $array_padres = $array_totales;

            $array_hijos = [];
            $nivel++;
        } while ($verificacion_existe && $nivel <=4);

       return $array_totales;








       /*  $niveles = 1;
        while ($niveles <= 4) {





            $niveles++;
        } */

       /*  $array_hijos = [];
        foreach ($array_padres as $id_padre) {
            while (!is_null($verificacion_existe)) {
                $verificacion_existe = User::where([
                    ['location', '=', $cont],
                    ['id_usuario_location', '=', $id_padre],
                ])->first();
                if ($verificacion_existe) {
                    array_push($array_hijos, $verificacion_existe->id);
                }else{
                    $ultimo_id_padre = $id_padre;
                    $ultimo_id_hijo = $cont;
                    break;
                }
            }
        }
        */


        dd($array_hijos);
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
