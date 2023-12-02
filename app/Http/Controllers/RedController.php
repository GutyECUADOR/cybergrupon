<?php

namespace App\Http\Controllers;

use App\Models\Comision;
use App\Models\Compra;
use App\Models\Packages;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use App\Models\Red;
use App\Models\TransferenciaSaldo;
use App\Models\User;
use Facade\Ignition\Support\Packagist\Package;
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
    public function index() {
        $NoPosition = new \stdclass();
        $NoPosition->id = '';
        $NoPosition->nickname = '';
        $posicion2_1 = $NoPosition;
        $posicion2_2 = $NoPosition;
        $posicion2_3 = $NoPosition;
        $posicion3_1 = $NoPosition;
        $posicion3_2 = $NoPosition;
        $posicion3_3 = $NoPosition;
        $posicion3_4 = $NoPosition;
        $posicion3_5 = $NoPosition;
        $posicion3_6 = $NoPosition;
        $posicion3_7 = $NoPosition;
        $posicion3_8 = $NoPosition;
        $posicion3_9 = $NoPosition;

        // NIVEL 1
        $posicion1_1 =  Auth::user();

        //NIVEL 2
        $posicion2_1 =  DB::table('users')
            ->where('id_usuario_location', $posicion1_1->id)
            ->where('location', 1)
            ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
            ->first();

        $posicion2_2 =  DB::table('users')
            ->where('id_usuario_location', $posicion1_1->id)
            ->where('location', 2)
            ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
            ->first();

        $posicion2_3 =  DB::table('users')
            ->where('id_usuario_location', $posicion1_1->id)
            ->where('location', 3)
            ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
            ->first();

        // NIVEL 3

        if ($posicion2_1) {
            // Tercer nivel
            $posicion3_1 =  DB::table('users')
            ->where('id_usuario_location',  $posicion2_1->id)
            ->where('location', 1)
            ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
            ->first();

            $posicion3_2 =  DB::table('users')
                ->where('id_usuario_location',  $posicion2_1->id)
                ->where('location', 2)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            $posicion3_3 =  DB::table('users')
                ->where('id_usuario_location',  $posicion2_1->id)
                ->where('location', 3)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();
        }

        if ($posicion2_2) {
            $posicion3_4 =  DB::table('users')
                ->where('id_usuario_location',  $posicion2_2->id)
                ->where('location', 1)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            $posicion3_5 =  DB::table('users')
                ->where('id_usuario_location',  $posicion2_2->id)
                ->where('location', 2)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            $posicion3_6 =  DB::table('users')
                ->where('id_usuario_location',  $posicion2_2->id)
                ->where('location', 3)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();
        }

        if ($posicion2_3) {

            $posicion3_7 =  DB::table('users')
                ->where('id_usuario_location',  $posicion2_3->id)
                ->where('location', 1)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            $posicion3_8 =  DB::table('users')
                ->where('id_usuario_location',  $posicion2_3->id)
                ->where('location', 2)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            $posicion3_9 =  DB::table('users')
                ->where('id_usuario_location',  $posicion2_3->id)
                ->where('location', 3)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();
        }

        $linksPublicidad = AdvertisingHelperController::getlinksPublicidad();
        $packages = Packages::all();
        return view('red.index', compact('linksPublicidad','packages','posicion1_1','posicion2_1', 'posicion2_2', 'posicion2_3', 'posicion3_1', 'posicion3_2', 'posicion3_3', 'posicion3_4', 'posicion3_5', 'posicion3_6', 'posicion3_7', 'posicion3_8', 'posicion3_9'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $existeUsuarioEnUbicacion = User::where([
                                                ['location', '=', $request->location],
                                                ['id_usuario_location', '=', $request->id_usuario_location],
                                            ])->first();

        if ($existeUsuarioEnUbicacion) {
            return redirect()->route('red.index')->withErrors(['message' => 'Ya existe un usuario en esta ubicación. Si el problema persiste contacte a soporte']);
        }


        $custom_messages = [
            'nickname_promoter.exists' => 'El nick o código del promotor no existe, indique un código correcto.',
            'id_usuario_location.required' => 'Esta ubicación no esta habilitada, selecciona una ubicación directa a otro usuario.'
        ];

        $request->validate([
            'nickname' => ['required', 'string', 'max:191', 'unique:users'],
            'location' => ['required', 'integer','between:1,3'],
            'id_usuario_location' => ['required', 'exists:users,id'],
            'nickname_promoter' => ['exists:users,nickname', 'string', 'max:191'],
            'paquete' => ['exists:packages,id'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'phone' => ['required', 'string', 'max:15'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], $custom_messages);

        // Validar que usuario tenga saldo
        $paquete = Packages::findOrFail($request->paquete);

        if (Auth::user()->SaldoActual < $paquete->PrecioAcumuladoWithOutID) {
            return redirect()->route('recargasaldo.index')->withErrors(['message' => 'No tienes saldo suficiente, tu saldo actual es de:'. Auth::user()->SaldoActual]);
        }

        $user = User::create([
            'nickname' => $request->nickname,
            'nicklocationname' => $request->location,
            'location' => $request->location,
            'id_usuario_location' => $request->id_usuario_location,
            'nickname_promoter' => $request->nickname_promoter,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);


        Compra::create([
            'user_id' => $user->id,
            'package_id' => $request->paquete,
            'valor' => $paquete->PrecioAcumuladoWithOutID,
            'gateway' => 'Saldos',
            'orderID_interno' => 'Saldos',
            'orderID_gateway' => 'Saldos',
            'status' => 'Complete'
        ]);

        TransferenciaSaldo::create([
            'user_envio' => Auth::user()->id,
            'user_recibe' => $user->id,
            'valor' => $paquete->PrecioAcumuladoWithOutID,
        ]);

        $this->generateComisions($user, $paquete);

        return redirect()->route('red.index')->with('status', 'Se ha registrado con éxito');
    }


    public function generateComisions($user, $paquete_comprado) {

        $usuario_promotor = User::where('nickname', $user->nickname_promoter)->firstOrFail();
        $paquete_inicial = Packages::FindOrFail(1);
        Comision::create([
            'user_id' => $usuario_promotor->id,
            'valor' => $paquete_inicial->price
        ]);

        $usuario_transicion = User::where('id', $user->id_usuario_location)->firstOrFail();
        $usuario_pago = User::where('id', $usuario_transicion->id_usuario_location)->firstOrFail();
        for ($cont=2; $cont <= $paquete_comprado->nivel; $cont++) {

            $valor = 0;
            $paquete = Packages::FindOrFail($cont);

            if ($usuario_pago->NivelActual >= $cont) {

                $valor = $paquete->price;
                Comision::create([
                    'user_id' => $usuario_pago->id,
                    'valor' => $valor
                ]);
            }

            $usuario_pago = User::where('id', $usuario_pago->id_usuario_location)->firstOrFail();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Red  $red
     * @return \Illuminate\Http\Response
     */
    public function show($id){

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Red  $red
     * @return \Illuminate\Http\Response
     */
    public function subred(Request $request)
    {
        $id = $request->get('id');

        // Validar ids a nietos permitidos
        $nietos = $this->getListNietos(Auth::user()->id);

        if (in_array($id, $nietos)) {

            $NoPosition = new \stdclass();
            $NoPosition->id = '';
            $NoPosition->nickname = '';
            $posicion2_1 = $NoPosition;
            $posicion2_2 = $NoPosition;
            $posicion2_3 = $NoPosition;
            $posicion3_1 = $NoPosition;
            $posicion3_2 = $NoPosition;
            $posicion3_3 = $NoPosition;
            $posicion3_4 = $NoPosition;
            $posicion3_5 = $NoPosition;
            $posicion3_6 = $NoPosition;
            $posicion3_7 = $NoPosition;
            $posicion3_8 = $NoPosition;
            $posicion3_9 = $NoPosition;

            // NIVEL 1
            $posicion1_1 =  User::findOrFail($id);

            //NIVEL 2
            $posicion2_1 =  DB::table('users')
                ->where('id_usuario_location', $posicion1_1->id)
                ->where('location', 1)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            $posicion2_2 =  DB::table('users')
                ->where('id_usuario_location', $posicion1_1->id)
                ->where('location', 2)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            $posicion2_3 =  DB::table('users')
                ->where('id_usuario_location', $posicion1_1->id)
                ->where('location', 3)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            // NIVEL 3

            if ($posicion2_1) {
                // Tercer nivel
                $posicion3_1 =  DB::table('users')
                ->where('id_usuario_location',  $posicion2_1->id)
                ->where('location', 1)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

                $posicion3_2 =  DB::table('users')
                    ->where('id_usuario_location',  $posicion2_1->id)
                    ->where('location', 2)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();

                $posicion3_3 =  DB::table('users')
                    ->where('id_usuario_location',  $posicion2_1->id)
                    ->where('location', 3)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();
            }

            if ($posicion2_2) {
                $posicion3_4 =  DB::table('users')
                    ->where('id_usuario_location',  $posicion2_2->id)
                    ->where('location', 1)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();

                $posicion3_5 =  DB::table('users')
                    ->where('id_usuario_location',  $posicion2_2->id)
                    ->where('location', 2)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();

                $posicion3_6 =  DB::table('users')
                    ->where('id_usuario_location',  $posicion2_2->id)
                    ->where('location', 3)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();
            }

            if ($posicion2_3) {

                $posicion3_7 =  DB::table('users')
                    ->where('id_usuario_location',  $posicion2_3->id)
                    ->where('location', 1)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();

                $posicion3_8 =  DB::table('users')
                    ->where('id_usuario_location',  $posicion2_3->id)
                    ->where('location', 2)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();

                $posicion3_9 =  DB::table('users')
                    ->where('id_usuario_location',  $posicion2_3->id)
                    ->where('location', 3)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();
            }
            $packages = Packages::all();
            return view('red.index', compact('packages','posicion1_1','posicion2_1', 'posicion2_2', 'posicion2_3', 'posicion3_1', 'posicion3_2', 'posicion3_3', 'posicion3_4', 'posicion3_5', 'posicion3_6', 'posicion3_7', 'posicion3_8', 'posicion3_9'));


        }
        return redirect()->route('red.index')->withErrors(['message' => 'No tines permiso para ver este árbol. Contacte a soporte']);
    }


    private function getListNietos($ID_Partner) {
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
            }
            $cont++;
        } while ($cont <=3);


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

                    }

                    $cont++;
                } while ($cont <=3);
            }
            $array_padres = $array_totales;
            $nivel++;
        } while ($nivel <=1);

        return $array_totales;
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
