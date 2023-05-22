<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PaymentController::class, 'index'])->name('payments');
Route::get('/boleto/{id_payment}', [PaymentController::class, 'showBoleto'])->name('boleto');
Route::get('/pix/{id_payment}', [PaymentController::class, 'showPix'])->name('pix');
Route::get('/credito/{id_payment}', [PaymentController::class, 'showCredito'])->name('credito');
Route::post('payment', [PaymentController::class, 'store'])->name('payment.store');
