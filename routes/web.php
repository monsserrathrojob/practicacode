<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('inicio');
});
Route::view('/login', "login")->name('login');
Route::view('/inicio', "inicio")->name('inicio');
Route::post('/inicia-sesion',[UserController::class,'iniciarSesion'])->name('inicia-sesion');
