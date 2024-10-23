<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DiasInversionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\TiendaVIPController;
use App\Http\Controllers\RecargaSaldoController;
use App\Http\Controllers\RedController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\CompraVIPController;
use App\Http\Controllers\InversionController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\RetiroVIPController;
use App\Http\Controllers\TransferenciaSaldoController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\BinancePayController;
use App\Http\Controllers\CheckPagoController;
use App\Http\Controllers\IPNUnipayment;
use App\Http\Controllers\TipoInversionController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ReferidosController;
use App\Http\Controllers\RegisterReferido;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdvertisingHelperController;
use App\Http\Controllers\AyudaController;
use App\Http\Controllers\VerificaLinksController;
use App\Mail\SoporteUsuarioMaileable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* Route::get('/', function () {
    return redirect()->to('login');
}); */

/*
Route::any('{query}',
    function() { return view('mantenimiento'); })
    ->where('query', '.*'); */

Route::get('/locale/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'es'])) {
        abort(400);
    }
    session()->put('locale', $locale);

    return Redirect::back();

})->name('locale');

Route::get('/', function () {
    $linksPublicidad = AdvertisingHelperController::getlinksPublicidad();
    //dd($linksPublicidad);
    return view('welcome', compact('linksPublicidad'));
});

Route::get('/mantenimiento', function() {
    return view('mantenimiento');
});

Route::get('/referido/{nickname}', [RegisterReferido::class, 'create'])->name('referido.create');
Route::post('/referido', [RegisterReferido::class, 'store'])->name('referido.store');
Route::get('/callbackpay', [BinancePayController::class, 'callbackpay'])->name('callbackpay');
Route::resource('/binancepay', BinancePayController::class);
//Route::resource('/test', TestController::class);

Route::middleware(['auth','checkPagoOk'])->group(function () {
    Route::resource('/check-pago', CheckPagoController::class);
});

Route::middleware(['auth','role'])->group(function () {
    Route::get('/users', [RegisteredUserController::class, 'index'])->name('users-list');
});

Route::middleware(['auth','checkPago','checkReferidos'])->group(function () {

    Route::get('/dashboard', [CreditoController::class, 'index'])->name('dashboard');
   
    Route::resource('/mis-referidos', ReferidosController::class);
    Route::resource('/red', RedController::class);
    Route::get('/red/asignar', [RedController::class, 'create'])->name('red.asignar');
    Route::post('/subred', [RedController::class, 'subred'])->name('red.subred');
    Route::get('/subred2', [RedController::class, 'subred2'])->name('red.subred2');
    Route::post('/subred2', [RedController::class, 'subred2'])->name('red.subred2');
    Route::resource('/recargasaldo', RecargaSaldoController::class);
    Route::resource('/pagos', PagoController::class);
    Route::resource('/retiros-vip', RetiroVIPController::class);
    //Route::resource('/transferencia', TransferenciaSaldoController::class);
    Route::resource('/tienda', TiendaController::class);
    Route::resource('/tienda-VIP', TiendaVIPController::class);
    Route::resource('/compra', CompraController::class);
    Route::resource('/compra-VIP', CompraVIPController::class);
    Route::resource('/ayuda', AyudaController::class);
    Route::resource('/verificalinks', VerificaLinksController::class);
    Route::post('/uploadfile',[FileController::class, 'store'])->name('uploadFile');
});

Route::middleware(['auth','checkPago'])->group(function () {
    Route::resource('/profile', ProfileController::class);
});

require __DIR__.'/auth.php';
