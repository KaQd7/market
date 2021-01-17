<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;

//use App\Helpers\Token;
use App\Firebase\JWT\JWT;
use App\Models\User;

class UserController extends Controller
{
    public function crearUsuario(Request $request){

    	$respuesta = "";

        //$token = new Token();

    	$data = $request->getContent();

    	$data = json_decode($data);

    	$user = new User();

    	$user->usuario = $data->usuario;
    	$user->email = $data->email;
    	$user->contrasena = $data->contrasena;
    	$user->rol = $data->rol;
        $user->user_token = encrypt($data->email.now());

    	try{
    		$user->contrasena = Hash::make($user->contrasena);
    		$user->save();
    		$respuesta = "Usuario guardado en la base de datos";
    	}catch(\Exception $e){
    		$respuesta = $e->getMessage();
    	}


    	return response($respuesta);
    }

    public function iniciarSesion(Request $request){

    	$respuesta = "";

    	$data = User::find($request->usuario);

        //var_dump( $data);

    	if ($data && Hash::check($request->contrasena, $data->contrasena)) {
    		$respuesta = "Usuario logeado";
    	}else{
    		$respuesta = "Datos incorrectos";
    	}

    	return response($respuesta);
    }

    public function recuperarPassword(Request $request){

        $respuesta = "";

        $data = User::where('email',$request->email) -> first();

        if (!$data) {
           $respuesta = "El correo no existe";
        }else{

            $newPassword = Str::random(10);

            $hashedPassword = Hash::make($newPassword);

            try{
                $data->contrasena = $hashedPassword;
                $data->save();
                $respuesta = "Esta es tu nueva contraseña: " . $newPassword;
            }catch(\Exception $e){
                $respuesta = $e->getMessage();
            }
        }



        return response($respuesta);
    }
}
