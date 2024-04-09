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

    public static function getlinksPublicidadByNickName(String $nickname) {

        $linksPublicidad1 = User::select('users.id','users.link_publicidad', 'users.link_redireccion', 'compras.package_id')
        ->join('compras', 'users.id', '=', 'compras.user_id')
        ->whereNotNull('users.link_publicidad')
        ->where('users.nickname', $nickname);

        $linksPublicidad2 = User::select('users.id','users.link_publicidad2 as link_publicidad', 'users.link_redireccion2 as link_redireccion', 'compras.package_id')
        ->join('compras', 'users.id', '=', 'compras.user_id')
        ->whereNotNull('users.link_publicidad2')
        ->where('users.nickname', $nickname);

        $linksPublicidad3 = User::select('users.id','users.link_publicidad3 as link_publicidad', 'users.link_redireccion3 as link_redireccion', 'compras.package_id')
        ->join('compras', 'users.id', '=', 'compras.user_id')
        ->whereNotNull('users.link_publicidad3')
        ->where('users.nickname', $nickname);

        $linksPublicidad4 = User::select('users.id','users.link_publicidad4 as link_publicidad', 'users.link_redireccion4 as link_redireccion', 'compras.package_id')
        ->join('compras', 'users.id', '=', 'compras.user_id')
        ->whereNotNull('users.link_publicidad4')
        ->where('users.nickname', $nickname);

        $linksPublicidad5 = User::select('users.id','users.link_publicidad5 as link_publicidad', 'users.link_redireccion5 as link_redireccion', 'compras.package_id')
        ->join('compras', 'users.id', '=', 'compras.user_id')
        ->whereNotNull('users.link_publicidad5')
        ->where('users.nickname', $nickname);


        // VIPS

        $linksPublicidad6 = User::select('users.id','users.link_publicidadVIP as link_publicidad', 'users.link_redireccionVIP as link_redireccion', 'compras.package_id')
        ->join('compras', 'users.id', '=', 'compras.user_id')
        ->whereNotNull('users.link_publicidadVIP')
        ->where('users.nickname', $nickname);

        $linksPublicidad7 = User::select('users.id','users.link_publicidadVIP2 as link_publicidad', 'users.link_redireccionVIP2 as link_redireccion', 'compras.package_id')
        ->join('compras', 'users.id', '=', 'compras.user_id')
        ->whereNotNull('users.link_publicidadVIP2')
        ->where('users.nickname', $nickname);

        $linksPublicidad8 = User::select('users.id','users.link_publicidadVIP3 as link_publicidad', 'users.link_redireccionVIP3 as link_redireccion', 'compras.package_id')
        ->join('compras', 'users.id', '=', 'compras.user_id')
        ->whereNotNull('users.link_publicidadVIP3')
        ->where('users.nickname', $nickname);

        $linksPublicidad9 = User::select('users.id','users.link_publicidadVIP4 as link_publicidad', 'users.link_redireccionVIP4 as link_redireccion', 'compras.package_id')
        ->join('compras', 'users.id', '=', 'compras.user_id')
        ->whereNotNull('users.link_publicidadVIP4')
        ->where('users.nickname', $nickname);

        $linksPublicidad = User::select('users.id','users.link_publicidadVIP5 as link_publicidad', 'users.link_redireccionVIP5 as link_redireccion', 'compras.package_id')
        ->join('compras', 'users.id', '=', 'compras.user_id')
        ->whereNotNull('users.link_publicidadVIP5')
        ->where('users.nickname', $nickname)

        ->union($linksPublicidad1)
        ->union($linksPublicidad2)
        ->union($linksPublicidad3)
        ->union($linksPublicidad4)
        ->union($linksPublicidad5)
        ->union($linksPublicidad6)
        ->union($linksPublicidad7)
        ->union($linksPublicidad8)
        ->union($linksPublicidad9)
        ->get();

        return $linksPublicidad;
    }

}
