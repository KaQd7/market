<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Colection;


class CardController extends Controller
{
	public function crearCarta(Request $request)
    {

    	
    	$response = "";

    	
    	
		$data = $request->getContent();

		//Decodificar el json
		$data = json_decode($data);

		if($data){

			$card = new Card();
			

			

			
			$card->nombre = $data->nombre;
			$card->descripcion = $data->descripcion;
			$card->coleccion = $data->coleccion;
			$card->colections_id = $data->colections_id;
			
			
		
           
			try{
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
