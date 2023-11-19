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
            'is_payed' => 1,
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
                    'is_payed' => true,
                    'nickname_promoter' => 'administrador',
                    'email' => 'partner'.$index.$position.'@cybergrupon.com',
                    'phone' => '+593',
                    'password' => Hash::make('admin2023'),
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



       /*  foreach (range(1,10) as $index) {
            User::create([
                'nickname' => 'test'.$index,
                'is_payed' => 0,
                'package_id' => 1,
                'nickname_promoter' => '',
                'email' => 'test'.$index.'@test.com',
                'phone' => '+593',
                'password' => Hash::make('12345678'),
                'imagen_recibo' => null
            ]);
        } */



    }
}
