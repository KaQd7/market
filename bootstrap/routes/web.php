

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ColectionController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\VentaController;

Route::get('/', function () {
  
return view ('ajaxRequest');
});

Route::get('/crearColeccion', function () {
  

return view ('colecciones');
});


Route::get('/login', function () {
  
return view ('login');
});

Route::get('/crearCarta', function () {
  
return view ('cartas');
});

Route::get('/createventa', function () {
  
return view ('ventas');
});
Route::get('/newPassword', function () {
  
return view ('password');
});
Route::get('/crearAdmin', function () {
  
return view ('admin');
});


Route::post('/crearColeccion',[ColectionController::class,"crearColecion"])->name('crearColeccion');


Route::post('/register',[UsuarioController::class,"register"])->name('register');
Route::post('/crearAdmin',[UsuarioController::class,"crearAdmin"])->name('crearAdmin');

Route::post('/newPassword',[UsuarioController::class,"newPassword"])->name('newPassword');
Route::post('/login',[UsuarioController::class,"login"])->name('login');
Route::post('/crearCarta',[CardController::class,"crearCarta"])->name('crearCarta');


Route::post('/createventa',[VentaController::class,"createventa"])->name('createventa');
