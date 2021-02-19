<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ColectionController;
use App\Http\Controllers\VentaController;

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

Route::get('/register', function () {
return view ('ajaxRequest');
});


Route::get('/crearColeccion', function () {
return view ('colecciones');
});


Route::get('/login', function () {
return view ('login');
});

Route::get('/ventas', function () {
return view ('listaVentas');
});

Route::get('/compras', function () {
return view ('listaCompra');
});


Route::post('/crearColeccion',[ColectionController::class,"crearColecion"])->name('crearColeccion');


 //Route::get('ajaxRequest', 'AjaxController@ajaxRequest');
//Route::post('ajaxRequest', 'AjaxController@ajaxRequestPost')->name('postAjax');
//Route::post('/postAjax',[AjaxController::class,"ajaxRequestPost"])->name('postAjax');
Route::post('/register',[UsuarioController::class,"register"])->name('register1');
Route::post('/login',[UsuarioController::class,"login"])->name('login');

Route::post('/listaventas',[VentaController::class,"listaventas"])->name('listaventas');
Route::post('/listaCompra',[VentaController::class,"listaCompra"])->name('listaCompra');


