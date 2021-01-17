<?php

namespace App\Http\Controllers;

use App\Models\Coleccion;
use Illuminate\Http\Request;

class ColeccionController extends Controller
{
    public function crearColeccion(Request $request){

        $respuesta = "";

        $data = $request->getContent();

        //$data = json_decode($data);

        echo $data;

        //$coleccion = new Coleccion();

        /*$coleccion->nombre = $data->nombre;
        $coleccion->simbolo = $data->file('imagen');
        $coleccion->fecha_edicion = $data->fecha_edicion;

        try{
            $coleccion->save();
            $respuesta = "Coleccion guardada en la base de datos";
        }catch(\Exception $e){
            $respuesta = $e->getMessage();
        }*/


        return response($respuesta);
    }
}
