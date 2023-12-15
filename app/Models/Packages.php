<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Packages extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'nivel',
        'imagen',
        'descripcion',
    ];

    public function getPrecioAcumuladoAttribute () {

        $package_mayor = Compra::where('user_id', Auth::user()->id)
                    ->where('package_id', '<=', '5')
                    ->max('package_id');
        if (!$package_mayor) {
            $package_mayor = 0;
        }

        $precioAcumulado = Packages::where('nivel', '>', $package_mayor)
                            ->where('tipo', 'normal')
                            ->where('nivel', '<=', $this->nivel)->sum('price');

        return $precioAcumulado;
    }

    public function getPrecioAcumuladoVIPAttribute () {

        $package_mayor = Compra::where('user_id', Auth::user()->id)->max('package_id');
        if (!$package_mayor) {
            $package_mayor = 0;
        }
        $precioAcumulado = Packages::where('nivel', '>', $package_mayor)
                            ->where('tipo', 'VIP')
                            ->where('nivel', '<=', $this->nivel)
                            ->sum('price');

        return $precioAcumulado;
    }

    public function getPrecioAcumuladoWithOutIDAttribute () {

        $precioAcumulado = Packages::all()->where('nivel', '<=', $this->nivel)->sum('price');

        return $precioAcumulado;
    }
}
