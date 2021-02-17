<?php

namespace App\Http\Controllers;
use App\Models\Venta;
use App\Middleware\Authenticate;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function createventa(Request $request){

        $response = "";

       

        //Leer el contenido de la petición
        $data = $request->getContent();

        //Decodificar el json
        $data = json_decode($data);

        if($data){

            $venta = new Venta();

            //TODO: Validar los datos antes de guardar el usuario

            $venta->nombre_venta = $data->nombre_venta;
            $venta->cantidad = $data->cantidad;
            $venta->precio = $data->precio;
            $venta->cards_id = $data->cards_id;

            try{
                $venta->save();
                $response = "OK";
            }catch(\Exception $e){
                $response = $e->getMessage();
            }

 
        }


        return response($response);
    }
public function listaventas(Request $request,$name){

        $venta = Venta::where('nombre_venta','like','%'. $name .'%')->get();


            $data = [];

            foreach ($venta as $venta1){

                $data[] =    [

                    'name' => $venta1->nombre_venta,
                    'quantity' => $venta1->cantidad,
                    'price' => $venta1->precio,
                    'Id' => $venta1->cards_id

                ];
        }

        return $data;
    }
    public function listaCompra(Request $request,$name){

        $compra = Venta::where('nombre_venta','like','%'. $name .'%')->orderBy('precio','asc')->get();
       $nombre_usuario1 = new Authenticate();

            $data = [];

            foreach ($compra as $compra1){

                $data[] =    [

                    'name' => $compra1->nombre_venta,
                    'quantity' => $compra1->cantidad,
                    'price' => $compra1->cards_id,
                    'nombre_usuraio' => $nombre_usuraio1->$permiso
                    $user => 


                ];
        }

        return $data;
    }



}