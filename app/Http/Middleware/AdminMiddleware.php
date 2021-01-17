<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AdminMiddleware
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

        $user = User::where('user_token',$request->token)->first();

        if (!$user) {

                $response = [
                    'mensaje' => 'Token inválido',
                ];

                return response()->json($response, 404);

        }else{

            if($user && $user->rol=='administrador') {
                $response = $next($request);
            }else{
                $response = [
                    'usuario' => $user->usuario,
                    'mensaje' => 'El usuario no dispone de las credenciales necesarias',
                ];

            return response()->json($response, 403);
            }               
        }
        
        return $response;
    }
}
