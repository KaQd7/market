<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ColectionController;

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
  


return view ('ajaxRequest');
});

Route::get('/crearColeccion', function () {
  


return view ('colecciones');
});
Route::get('/login', function () {
  


return view ('login');
});
Route::post('/crearColeccion',[ColectionController::class,"crearColecion"])->name('crearColeccion');


 //Route::get('ajaxRequest', 'AjaxController@ajaxRequest');
//Route::post('ajaxRequest', 'AjaxController@ajaxRequestPost')->name('postAjax');
//Route::post('/postAjax',[AjaxController::class,"ajaxRequestPost"])->name('postAjax');
Route::post('/register',[UsuarioController::class,"register"])->name('register');
Route::post('/login',[UsuarioController::class,"login"])->name('login');


