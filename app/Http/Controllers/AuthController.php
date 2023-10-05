<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
       
        $credenciais = $request->all(['email', 'password']);

         //autenticacao (email e senha)
        $token = auth('api')->attempt($credenciais);
        if($token){ //usuario autenticado
            return response()->json(['token' => $token], 200);
        } else { //usuario nao autenticado ERRO
            return response()->json(['erro' => 'Usuario ou senha invalido'], 403);
        }
        
        //retornar um token JWT
        return 'login';
    }
    public function logout(){
        return 'logout';
    }
    public function refresh(){
        return 'refresh';
    }
    public function me(){
        return 'me';
    }
}
