<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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

        if ($posicion2_1) {

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





        return view('red.index', compact('posicion1_1','posicion2_1', 'posicion2_2', 'posicion2_3', 'posicion3_1', 'posicion3_2', 'posicion3_3', 'posicion3_4', 'posicion3_5', 'posicion3_6', 'posicion3_7', 'posicion3_8', 'posicion3_9'));
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
        $custom_messages = [
            'nickname_promoter.exists' => 'El nick o código del promotor no existe, indique un código correcto.',
            'id_usuario_location.required' => 'Esta ubicación no esta habilitada, selecciona una ubicación directa a otro usuario.'
        ];

        //dd($request->all());

        $request->validate([
            'nickname' => ['required', 'string', 'max:191', 'unique:users'],
            'location' => ['required'],
            'id_usuario_location' => ['required'],
            'nickname_promoter' => ['exists:users,nickname', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'phone' => ['required', 'string', 'max:15'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], $custom_messages);

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

        return redirect()->route('red.index')->with('status', 'Se ha registrado con éxito'); ;
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
