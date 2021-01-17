<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use App\Models\Coleccion;
use Illuminate\Http\Request;

class CartasController extends Controller
{
    public function crearCarta(Request $request){

        $respuesta = "";

        $data = $request->getContent();

        if ($data) {
            $data = json_decode($data);

            $carta = new Carta();

            $carta->nombre = $data->nombre;
            $carta->descripcion = $data->descripcion;

            $coleccion = Coleccion::find($carta->coleccion);

            if (!$coleccion) {
                $crearColeccion = new Coleccion();

                $crearColeccion->nombre = $data->coleccion;
                $carta->coleccion = $data->coleccion;

                try{
                    $crearColeccion->save();
                }catch(\Exception $e){
                    $respuesta = $e->getMessage();
                }
                
            }else{
                $carta->coleccion = $data->coleccion;
            }
        }


        


        try{
            $carta->save();
            $respuesta = "Carta guardada en la base de datos";
        }catch(\Exception $e){
            $respuesta = $e->getMessage();
        }


        return response($respuesta);
    }

}
