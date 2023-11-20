<?php

namespace Database\Seeders;

use App\Models\Compra;
use App\Models\RecargaSaldo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'nickname' => 'administrador',
            'nickname_promoter' => '',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'role' => 'ADMIN_ROLE',
            'phone' => '+593',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_payed' => 0,
            ],
        );

        RecargaSaldo::create([
            'user_id' => $admin->id,
            'valor' => '640',
            'gateway' => 'Saldo Inicial',
            'orderID_interno' => 'DBSeed',
            'orderID_gateway' => 'DBSeed',
            'status' => 'Payed'
        ]);

        Compra::create([
            'user_id' => $admin->id,
            'package_id' => 5,
            'valor' => '640',
            'gateway' => 'DBInit',
            'orderID_interno' => 'DBSeed',
            'orderID_gateway' => 'DBSeed',
            'status' => 'Payed'
        ]);

        foreach (range(1,120) as $index) {

            for ($position=1; $position <= 3; $position++) {

                $user = User::create([
                    'nickname' => 'partner'.$index.$position,
                    'is_payed' => false,
                    'nickname_promoter' => 'administrador',
                    'email' => 'partner'.$index.$position.'@cybergrupon.com',
                    'phone' => '+593',
                    'password' => Hash::make('19095725877Us'),
                    'imagen_recibo' => null,
                    'location' => $position,
                    'id_usuario_location' => $index
                ]);

                RecargaSaldo::create([
                    'user_id' => $user->id,
                    'valor' => '640',
                    'gateway' => 'Saldo Inicial',
                    'orderID_interno' => 'DBSeed',
                    'orderID_gateway' => 'DBSeed',
                    'status' => 'Payed'
                ]);

                Compra::create([
                    'user_id' => $user->id,
                    'package_id' => 5,
                    'valor' => '640',
                    'gateway' => 'DBInit',
                    'orderID_interno' => 'DBSeed',
                    'orderID_gateway' => 'DBSeed',
                    'status' => 'Payed'
                ]);





            }
        }


        foreach (range(1975,1980) as $index_hijos) {

            for ($position_hijos=1; $position_hijos <= 3; $position_hijos++) {

                $user = User::create([
                    'nickname' => 'creandolideres'.$index_hijos.$position_hijos,
                    'is_payed' => false,
                    'nickname_promoter' => 'administrador',
                    'email' => 'creandolideres'.$index_hijos.$position_hijos.'@gmail.com',
                    'phone' => '+593',
                    'password' => Hash::make('19095725877Us'),
                    'imagen_recibo' => null,
                    'location' => $position_hijos,
                    'id_usuario_location' => null
                ]);

                RecargaSaldo::create([
                    'user_id' => $user->id,
                    'valor' => '10640',
                    'gateway' => 'Saldo Inicial',
                    'orderID_interno' => 'DBSeed',
                    'orderID_gateway' => 'DBSeed',
                    'status' => 'Payed'
                ]);

                Compra::create([
                    'user_id' => $user->id,
                    'package_id' => 5,
                    'valor' => '640',
                    'gateway' => 'DBInit',
                    'orderID_interno' => 'DBSeed',
                    'orderID_gateway' => 'DBSeed',
                    'status' => 'Payed'
                ]);





            }
        }



    }
}
