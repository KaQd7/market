<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Colection;


class ColectionController extends Controller
{
	public function crearColecion(Request $request)
    {

    	
    	$response = "";

    	
    	//Leer el contenido de la petición
		$data = $request->getContent();

		//Decodificar el json
		$data = json_decode($data);

		if($data){

			$card = new Card();
			$coleccion = new Colection();


			
			$coleccion->nombre_coleccion = $data->nombre_coleccion;
			$coleccion->simbolo = $data->simbolo;
			$coleccion->fecha = $data->fecha;

			$card->nombre = $data->nombre;
			$card->descripcion = $data->descripcion;
			$card->coleccion = $data->coleccion;
			$card->colections_id = $data->colections_id;
			
		
           
			try{
				$coleccion->save();
				$card->save();
				
				$response = "OK";
			}catch(\Exception $e){
				$response = $e->getMessage();
			}

			
		}


		return response($response);
    //
	}
}
