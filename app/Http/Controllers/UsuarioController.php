<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use \Firebase\JWT\JWT;
use Illuminate\Support\Str;

class UsuarioController extends Controller
{
	public function register(Request $request)
    {

    	
    	$response = "";

    	
    	//Leer el contenido de la petición
		$data = $request->getContent();

		//Decodificar el json
		$data = json_decode($data);

		//Si hay un json válido, crear el libro
		if($data){

			$user = new User();

			$user->nombre = $data->nombre;
			$user->email = $data->email;
			$user->password = Hash::make($data->password);
			$user->rol = $data->rol;
           
			try{
				$user->save();
				$response = "OK";
			}catch(\Exception $e){
				$response = $e->getMessage();
			}

			
		}


		return response($response);
    }
    
    
    public function login(Request $request)
    {
    	$respuesta = "";

		//Procesar los datos recibidos
		$datos = $request->getContent();

		//Verificar que hay datos
		$datos = json_decode($datos);

		if($datos){
			
			if(isset($datos->email)&&isset($datos->password)){

				$user = User::where("email",$datos->email)->first();

				if($user){

					if(Hash::check($datos->password, $user->password)){
						$key = "kjsfdgiueqrbq39h9ht398erubvfubudfivlebruqergubi";
                        
                        $token = JWT::encode($datos->email, $key);

						$user->api_token = $token;

						$user->save();

						$respuesta = $token;
						return response()->json([
			
							
							'message' => 'bienvenido'
						]);

						

					}
				}
			}
		}
	}
	

	 
    public function crearAdmin(Request $request)
    {

    	
    	$response = "";

    	
    	//Leer el contenido de la petición
		$data = $request->getContent();

		//Decodificar el json
		$data = json_decode($data);

		if($data){

			$user = new User();

			

			
			$user->nombre = $data->nombre;
			$user->email = $data->email;
			$user->password = Hash::make($data->password);
			$user->rol_admin = $data->rol_admin;
           
			try{
				$user->save();
				$response = "OK";
			}catch(\Exception $e){
				$response = $e->getMessage();
			}

			
		}


		return response($response);
    }
}
		
		
    


