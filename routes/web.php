<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DiasInversionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\RecargaSaldoController;
use App\Http\Controllers\RedController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\InversionController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\TransferenciaSaldoController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\BinancePayController;
use App\Http\Controllers\CheckPagoController;
use App\Http\Controllers\IPNUnipayment;
use App\Http\Controllers\TipoInversionController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\RegisterReferido;
use App\Mail\SoporteUsuarioMaileable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/referido/{nickname}', [RegisterReferido::class, 'create'])->name('referido.create');
Route::post('/referido', [RegisterReferido::class, 'store'])->name('referido.store');
Route::get('/callbackpay', [BinancePayController::class, 'callbackpay'])->name('callbackpay');
Route::resource('/binancepay', BinancePayController::class);
Route::resource('/notify', IPNUnipayment::class);

Route::middleware(['auth','checkPagoOk'])->group(function () {
    Route::resource('/check-pago', CheckPagoController::class);
});

Route::middleware(['auth','role'])->group(function () {
    Route::get('/users', [RegisteredUserController::class, 'index'])->name('users-list');
});

Route::middleware(['auth','checkPago'])->group(function () {

    Route::get('/dashboard', [CreditoController::class, 'index'])->name('dashboard');
    Route::resource('/profile', ProfileController::class);
    Route::resource('/recargasaldo', RecargaSaldoController::class);
    Route::resource('/pagos', PagoController::class);
    Route::resource('/transferencia', TransferenciaSaldoController::class);
    Route::resource('/tienda', TiendaController::class);
    Route::resource('/compra', CompraController::class);
    Route::get('/red/asignar', [RedController::class, 'create'])->name('red.asignar');
    Route::resource('/red', RedController::class);
    Route::post('/subred', [RedController::class, 'subred'])->name('red.subred');
    Route::post('/uploadfile',[FileController::class, 'store'])->name('uploadFile');
});

require __DIR__.'/auth.php';
