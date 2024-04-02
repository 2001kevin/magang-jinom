<?php

use App\Http\Controllers\PesertaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('peserta', [PesertaController::class, 'index'])->name('peserta');
Route::post('peserta/update/{id}', [PesertaController::class, 'update'])->name('peserta-update');
Route::post('peserta/delete/{id}', [PesertaController::class, 'delete'])->name('peserta-delete');
// Route::post('');
