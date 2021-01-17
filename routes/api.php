<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CartasController;
use App\Http\Controllers\ColeccionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('usuario')->group(function(){

	Route::post('/crear',[UserController::class, 'crearUsuario']);
	Route::middleware('token')->post('/iniciar',[UserController::class, 'iniciarSesion']);
	Route::post('/recuperar',[UserController::class, 'recuperarPassword']);
	Route::get('/listaTodos',[SoldadosController::class, 'listaTodos']);
	Route::get('/infoSoldado/{placa}',[SoldadosController::class, 'infoSoldado']);		
});

Route::prefix('carta')->group(function(){

	Route::middleware('admin')->post('/crear',[CartasController::class, 'crearCarta']);

	//Route::post('/crear',[CartasController::class, 'crearCarta'])->middleware(['token','admin:Kevin1']);
	//Route::middleware(['token','admin'])->post('/crear',[CartasController::class, 'crearCarta']);

	
	Route::post('/recuperar',[UserController::class, 'recuperarPassword']);
	Route::get('/listaTodos',[SoldadosController::class, 'listaTodos']);
	Route::get('/infoSoldado/{placa}',[SoldadosController::class, 'infoSoldado']);		
});


Route::prefix('coleccion')->group(function(){

	Route::post('/crear',[ColeccionController::class, 'crearColeccion']);

});

