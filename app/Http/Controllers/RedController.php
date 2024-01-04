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
        $posicion2_1 =  User::where('id_usuario_location', $posicion1_1->id)
            ->where('location', 1)
            ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
            ->first();

        $posicion2_2 =  User::where('id_usuario_location', $posicion1_1->id)
            ->where('location', 2)
            ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
            ->first();

        $posicion2_3 =  User::where('id_usuario_location', $posicion1_1->id)
            ->where('location', 3)
            ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
            ->first();

        // NIVEL 3

        if ($posicion2_1) {
            // Tercer nivel

            $posicion3_1 = User::where('id_usuario_location',  $posicion2_1->id)
            ->where('location', 1)
            ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
            ->first();

            $posicion3_2 = User::where('id_usuario_location',  $posicion2_1->id)
                ->where('location', 2)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            $posicion3_3 = User::where('id_usuario_location',  $posicion2_1->id)
                ->where('location', 3)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();
        }

        if ($posicion2_2) {
            $posicion3_4 = User::where('id_usuario_location',  $posicion2_2->id)
                ->where('location', 1)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            $posicion3_5 = User::where('id_usuario_location',  $posicion2_2->id)
                ->where('location', 2)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            $posicion3_6 = User::where('id_usuario_location',  $posicion2_2->id)
                ->where('location', 3)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();
        }

        if ($posicion2_3) {

            $posicion3_7 = User::where('id_usuario_location',  $posicion2_3->id)
                ->where('location', 1)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            $posicion3_8 = User::where('id_usuario_location',  $posicion2_3->id)
                ->where('location', 2)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            $posicion3_9 = User::where('id_usuario_location',  $posicion2_3->id)
                ->where('location', 3)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();
        }

        $linksPublicidad = AdvertisingHelperController::getlinksPublicidad();
        $packages = Packages::where('nivel', '<', 6)
                    ->where('tipo', 'normal')
                    ->get();
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
            'pago_saldo' => ['required', 'integer'],
            'pago_saldoVIP' => ['required', 'integer'],
            'nickname_promoter' => ['exists:users,nickname', 'string', 'max:191'],
            'paquete' => ['exists:packages,id'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'phone' => ['required', 'string', 'max:15'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], $custom_messages);


        $paquete = Packages::findOrFail($request->paquete);

        // Verifica que usuario tenga saldo total suficiente
        if (Auth::user()->SaldoTotal < $paquete->PrecioAcumuladoWithOutID) {
            return redirect()->route('recargasaldo.index')->withErrors(['message' => 'No tienes saldo suficiente, tu saldo actual es de:'. Auth::user()->SaldoTotal]);
        }

        // Verifica que el total de paquete haya sido asignado
        if ($request->pago_saldo + $request->pago_saldoVIP != $paquete->PrecioAcumuladoWithOutID) {
            return redirect()->back()->withErrors(['message' => 'La suma de los pagos debe coincidir con el valor del paquete seleccionado'])->withInput();
        }

        // Verifica que usuario tenga saldo VIP suficiente para pagar el valor asignado para comprar paquete
        if (Auth::user()->SaldoVIPActual < $request->pago_saldoVIP) {
            return redirect()->back()->withErrors(['message' => 'No tienes saldo VIP suficiente, tu saldo VIP actual es de: '. Auth::user()->SaldoVIPActual. ' recarga saldo o realiza la compra con saldo normal'])->withInput();
        }

        // Verifica que usuario tenga saldo normal suficiente para pagar el valor asignado para comprar paquete
        if (Auth::user()->SaldoActual < $request->pago_saldo) {
            return redirect()->back()->withErrors(['message' => 'No tienes saldo normal suficiente, tu saldo normal actual es de: '. Auth::user()->SaldoActual. ' recarga saldo o realiza la compra con saldo VIP'])->withInput();
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

        if ($request->pago_saldoVIP > 0) {
            Compra::create([
                'user_id' => $user->id,
                'package_id' => $request->paquete,
                'valor' => $request->pago_saldoVIP,
                'gateway' => 'SaldosVIP',
                'orderID_interno' => 'Saldos',
                'orderID_gateway' => 'Saldos',
                'status' => 'Complete'
            ]);

            TransferenciaSaldo::create([
                'user_envio' => Auth::user()->id,
                'user_recibe' => $user->id,
                'isVIP' => 1,
                'valor' => $request->pago_saldoVIP,
            ]);
        }

        if ($request->pago_saldo > 0) {
            Compra::create([
                'user_id' => $user->id,
                'package_id' => $request->paquete,
                'valor' => $request->pago_saldo,
                'gateway' => 'Saldos',
                'orderID_interno' => 'Saldos',
                'orderID_gateway' => 'Saldos',
                'status' => 'Complete'
            ]);

            TransferenciaSaldo::create([
                'user_envio' => Auth::user()->id,
                'user_recibe' => $user->id,
                'isVIP' => 0,
                'valor' => $request->pago_saldo,
            ]);
        }



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
        //dd($nietos);

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
            $posicion1_1 = User::findOrFail($id);

            //NIVEL 2
            $posicion2_1 = User::where('id_usuario_location', $posicion1_1->id)
                ->where('location', 1)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            $posicion2_2 = User::where('id_usuario_location', $posicion1_1->id)
                ->where('location', 2)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            $posicion2_3 = User::where('id_usuario_location', $posicion1_1->id)
                ->where('location', 3)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            // NIVEL 3

            if ($posicion2_1) {
                // Tercer nivel
                $posicion3_1 = User::where('id_usuario_location',  $posicion2_1->id)
                ->where('location', 1)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

                $posicion3_2 = User::where('id_usuario_location',  $posicion2_1->id)
                    ->where('location', 2)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();

                $posicion3_3 = User::where('id_usuario_location',  $posicion2_1->id)
                    ->where('location', 3)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();
            }

            if ($posicion2_2) {
                $posicion3_4 = User::where('id_usuario_location',  $posicion2_2->id)
                    ->where('location', 1)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();

                $posicion3_5 = User::where('id_usuario_location',  $posicion2_2->id)
                    ->where('location', 2)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();

                $posicion3_6 = User::where('id_usuario_location',  $posicion2_2->id)
                    ->where('location', 3)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();
            }

            if ($posicion2_3) {

                $posicion3_7 = User::where('id_usuario_location',  $posicion2_3->id)
                    ->where('location', 1)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();

                $posicion3_8 = User::where('id_usuario_location',  $posicion2_3->id)
                    ->where('location', 2)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();

                $posicion3_9 = User::where('id_usuario_location',  $posicion2_3->id)
                    ->where('location', 3)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();
            }
            $packages = Packages::where('nivel', '<', 6)
                    ->where('tipo', 'normal')
                    ->get();
            $linksPublicidad = AdvertisingHelperController::getlinksPublicidad();
            return view('red.index', compact('linksPublicidad', 'packages','posicion1_1','posicion2_1', 'posicion2_2', 'posicion2_3', 'posicion3_1', 'posicion3_2', 'posicion3_3', 'posicion3_4', 'posicion3_5', 'posicion3_6', 'posicion3_7', 'posicion3_8', 'posicion3_9'));


        }
        return redirect()->route('red.index')->withErrors(['message' => 'No tines permiso para ver este árbol. Contacte a soporte']);
    }

    public function subred2(Request $request)
    {
        $id = $request->get('id');

        // Validar ids a nietos permitidos
        $nietos = $this->getListNietos(Auth::user()->id);
        //dd($nietos);

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
            $posicion2_1 = User::where('id_usuario_location', $posicion1_1->id)
                ->where('location', 1)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            $posicion2_2 = User::where('id_usuario_location', $posicion1_1->id)
                ->where('location', 2)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            $posicion2_3 = User::where('id_usuario_location', $posicion1_1->id)
                ->where('location', 3)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

            // NIVEL 3

            if ($posicion2_1) {
                // Tercer nivel
                $posicion3_1 = User::where('id_usuario_location',  $posicion2_1->id)
                ->where('location', 1)
                ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                ->first();

                $posicion3_2 = User::where('id_usuario_location',  $posicion2_1->id)
                    ->where('location', 2)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();

                $posicion3_3 = User::where('id_usuario_location',  $posicion2_1->id)
                    ->where('location', 3)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();
            }

            if ($posicion2_2) {
                $posicion3_4 = User::where('id_usuario_location',  $posicion2_2->id)
                    ->where('location', 1)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();

                $posicion3_5 = User::where('id_usuario_location',  $posicion2_2->id)
                    ->where('location', 2)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();

                $posicion3_6 = User::where('id_usuario_location',  $posicion2_2->id)
                    ->where('location', 3)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();
            }

            if ($posicion2_3) {

                $posicion3_7 = User::where('id_usuario_location',  $posicion2_3->id)
                    ->where('location', 1)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();

                $posicion3_8 = User::where('id_usuario_location',  $posicion2_3->id)
                    ->where('location', 2)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();

                $posicion3_9 = User::where('id_usuario_location',  $posicion2_3->id)
                    ->where('location', 3)
                    ->select('id', 'location', 'id_usuario_location', 'nickname', 'avatar')
                    ->first();
            }
            $packages = Packages::where('nivel', '<', 6)
                    ->where('tipo', 'normal')
                    ->get();
            $linksPublicidad = AdvertisingHelperController::getlinksPublicidad();
            return view('red.subred2', compact('linksPublicidad', 'id', 'packages','posicion1_1','posicion2_1', 'posicion2_2', 'posicion2_3', 'posicion3_1', 'posicion3_2', 'posicion3_3', 'posicion3_4', 'posicion3_5', 'posicion3_6', 'posicion3_7', 'posicion3_8', 'posicion3_9'));

        }
        return redirect()->route('red.index')->withErrors(['message' => 'No tines permiso para ver este árbol. Contacte a soporte']);
    }


    private function getListNietos($ID_Partner) {
        #recorrer for de 1 a 3 y llenar array con los ID existentes
        $array_padres = [];
        $array_hijos = [];
        $array_nietos = [];
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


        #3ER NIVEL

        $array_padres = $array_totales;
        $nivel = 1;

        do {
            foreach ($array_padres as $id_padre) {
                $cont = 1;
                do {
                    $verificacion_existe = User::where([
                        ['location', '=', $cont],
                        ['id_usuario_location', '=', $id_padre],
                    ])->first();

                    if ($verificacion_existe) {
                        array_push($array_nietos, $verificacion_existe->id);
                    }

                    $cont++;
                } while ($cont <=3);
            }

            $nivel++;
        } while ($nivel <=1);


        #4TO NIVEL

        $array_padres = $array_nietos;
        $nivel = 1;

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
