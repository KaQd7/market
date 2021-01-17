<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = "";

        $usuario = User::find($request->usuario);

        if ($usuario) {
            $user = User::where('user_token',$request->token)->first();

            if(!$user){
                $response = [
                    'usuario' => $request->usuario,
                    'mensaje' => 'El token es incorrecto',
                ];

                return response()->json($response, 400);
            }else{

                if (($usuario->user_token == $request->token)) {
                    $request->usuario = $user->usuario;
                    $response = $next($request);
                }else{
                    $response = [
                        'usuario' => $request->usuario,
                        'mensaje' => 'El token no coincide',
                    ];

                    return response()->json($response, 400);
                }
             }   
            
        }else{

            $response = [
                    'usuario' => $request->usuario,
                    'mensaje' => 'El usuario no existe',
            ];

            return response()->json($response, 404);
        }


        return $response;
    }
}
