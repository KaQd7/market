<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ColectionController;
use App\Http\Controllers\VentaController;





	Route::post('/register',[UsuarioController::class,"register"]);
	Route::post('/login',[UsuarioController::class,"login"]);
	Route::post('/newPassword',[UsuarioController::class,"newPassword"]);
	Route::post('/crearAdmin',[UsuarioController::class,"crearAdmin"])->middleware('guest');


Route::prefix('cards')->group(function () {
	Route::post('/crearCarta',[CardController::class,"crearCarta"])->middleware('guest');
	
	
});
Route::prefix('colections')->group(function () {
	Route::post('/crearColecion',[ColectionController::class,"crearColecion"])->middleware('guest');
	
	
});
Route::prefix('venta')->group(function (){
	
    
    Route::get('/listaventas/{nombre_venta}',[VentaController::class,"listaventas"])->middleware('auth');
    Route::post('/createventa',[VentaController::class,"createventa"])->middleware('auth');
    Route::get('/listaCompra/{nombre_venta}',[VentaController::class,"listaCompra"])->middleware('auth');

});

