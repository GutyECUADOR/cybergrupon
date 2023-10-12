<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert(array(
        [
            'name' => 'Plan 20 USD',
            'price' => 20,
            'nivel' => 1,
            'imagen' => 'banner.jpg',
            'descripcion' => 'Mi descripcion',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'Plan 40 USD',
            'price' => 40,
            'nivel' => 2,
            'imagen' => 'banner.jpg',
            'descripcion' => 'Mi descripcion',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'Plan 160 USD ',
            'price' => 160,
            'nivel' => 3,
            'imagen' => 'banner.jpg',
            'descripcion' => 'Mi descripcion',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'Plan 320 USD',
            'price' => 320,
            'nivel' => 4,
            'imagen' => 'banner.jpg',
            'descripcion' => 'Mi descripcion',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'Plan 640 USD',
            'price' => 640,
            'nivel' => 5,
            'imagen' => 'banner.jpg',
            'descripcion' => 'Mi descripcion',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]
        ));
    }
}
