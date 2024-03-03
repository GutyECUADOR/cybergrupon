<?php

namespace App\Http\Controllers;

use App\Models\Credito;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $linksPublicidad = AdvertisingHelperController::getlinksPublicidad();
        $usuario = Auth::user();
        return view('profile.edit', compact('usuario', 'linksPublicidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function show(Credito $credito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_usuario)
    {
        $usuario = User::find($id_usuario);

        $request->validate([
            'phone' => 'required|string|max:25'
        ]);

        $usuario->phone = $request->phone;
        $usuario->link_publicidad = $this->fixLink($request->link_publicidad);
        $usuario->link_redireccion = $request->link_redireccion;
        $usuario->link_publicidad2 = $this->fixLink($request->link_publicidad2);
        $usuario->link_redireccion2 = $request->link_redireccion2;
        $usuario->link_publicidad3 = $this->fixLink($request->link_publicidad3);
        $usuario->link_redireccion3 = $request->link_redireccion3;
        $usuario->link_publicidad4 = $this->fixLink($request->link_publicidad4);
        $usuario->link_redireccion4 = $request->link_redireccion4;
        $usuario->link_publicidad5 = $this->fixLink($request->link_publicidad5);
        $usuario->link_redireccion5 = $request->link_redireccion5;

        //Paquetes VIP
        $usuario->link_publicidadVIP = $this->fixLink($request->link_publicidadVIP);
        $usuario->link_redireccionVIP = $request->link_redireccionVIP;
        $usuario->link_publicidadVIP2 = $this->fixLink($request->link_publicidadVIP2);
        $usuario->link_redireccionVIP2 = $request->link_redireccionVIP2;
        $usuario->link_publicidadVIP3 = $this->fixLink($request->link_publicidadVIP3);
        $usuario->link_redireccionVIP3 = $request->link_redireccionVIP3;
        $usuario->link_publicidadVIP4 = $this->fixLink($request->link_publicidadVIP4);
        $usuario->link_redireccionVIP4 = $request->link_redireccionVIP4;
        $usuario->link_publicidadVIP5 = $this->fixLink($request->link_publicidadVIP5);
        $usuario->link_redireccionVIP5 = $request->link_redireccionVIP5;

        $usuario->save();
        return redirect()->route('profile.index')->with('status', 'Perfil actualizado con éxito!');
    }

    public function fixLink($link = '') {
        switch ($link) {
            case null:
                return '';

            case strpos($link, "https://www.youtube.com/watch?v=") === 0:
                $shortUrlRegex = "/youtu.be\/([a-zA-Z0-9_-]+)\??/i";
                $longUrlRegex = "/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i";

                if (preg_match($longUrlRegex, $link, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }

                if (preg_match($shortUrlRegex, $link, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }
                return 'https://www.youtube.com/embed/' . $youtube_id ;
                break;

            case strpos($link, "https://www.facebook.com/") === 0:
                if (strpos($link, "https://www.facebook.com/plugins") === 0) {
                    return $link;
                }else{
                    return 'https://www.facebook.com/plugins/video.php?&href=' . $link ;
                }
                break;

            default:
                return $link;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credito $credito)
    {

    }
}
