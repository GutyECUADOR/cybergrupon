<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdvertisingHelperController extends Controller {

    public static function getlinksPublicidad() {
        $linksPublicidad1 = User::select('users.id','users.link_publicidad', 'users.link_redireccion', 'compras.package_id')
        ->join('compras', 'users.id', '=', 'compras.user_id')
        ->whereNotNull('users.link_publicidad');

        $linksPublicidad2 = User::select('users.id','users.link_publicidad2 as link_publicidad', 'users.link_redireccion2 as link_redireccion', 'compras.package_id')
        ->join('compras', 'users.id', '=', 'compras.user_id')
        ->whereNotNull('users.link_publicidad2');

        $linksPublicidad3 = User::select('users.id','users.link_publicidad3 as link_publicidad', 'users.link_redireccion3 as link_redireccion', 'compras.package_id')
        ->whereNotNull('users.link_publicidad3')
        ->join('compras', 'users.id', '=', 'compras.user_id');

        $linksPublicidad4 = User::select('users.id','users.link_publicidad4 as link_publicidad', 'users.link_redireccion4 as link_redireccion', 'compras.package_id')
        ->whereNotNull('users.link_publicidad4')
        ->join('compras', 'users.id', '=', 'compras.user_id');

        $linksPublicidad = User::select('users.id','users.link_publicidad5 as link_publicidad', 'users.link_redireccion5 as link_redireccion', 'compras.package_id')
        ->join('compras', 'users.id', '=', 'compras.user_id')
        ->whereNotNull('users.link_publicidad5')
        ->unionAll($linksPublicidad1)
        ->unionAll($linksPublicidad2)
        ->unionAll($linksPublicidad3)
        ->unionAll($linksPublicidad4)
        ->inRandomOrder()->limit(4)
        ->get();
        return $linksPublicidad;
    }

}
