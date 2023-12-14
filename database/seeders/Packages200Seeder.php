<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Packages200Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages200')->insert(array(
        [
            'name' => 'Plan 200 USD',
            'price' => 200,
            'nivel' => 1,
            'imagen' => 'banner.jpg',
            'descripcion' => 'Mi descripcion',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'Plan 400 USD',
            'price' => 400,
            'nivel' => 2,
            'imagen' => 'banner.jpg',
            'descripcion' => 'Mi descripcion',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'Plan 1600 USD ',
            'price' => 1600,
            'nivel' => 3,
            'imagen' => 'banner.jpg',
            'descripcion' => 'Mi descripcion',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'Plan 3200 USD',
            'price' => 3200,
            'nivel' => 4,
            'imagen' => 'banner.jpg',
            'descripcion' => 'Mi descripcion',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'Plan 6400 USD',
            'price' => 6400,
            'nivel' => 5,
            'imagen' => 'banner.jpg',
            'descripcion' => 'Mi descripcion',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]
        ));
    }
}
