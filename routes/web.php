<?php

use App\Http\Controllers\prosesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/start', function () {
    return view('start');
});

Route::get('/startwithid', function () {
    return view('start2');
});

Route::get('/proses/{nisn}/{passcode}', [prosesController::class,'proses'])->name('proses');

route::get('/pilihpaslon',[prosesController::class,'pilih'])->name('pilih');

route::post('/pilihpaslon',[prosesController::class,'buat'])->name('buat');
