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
       
    }
    public function logout(){
        auth('api')->logout();
        return response()->json(['msg' => 'Logout foi realizado com sucesso!']);
    }
    public function refresh(){
        $token = auth('api')->refresh();
        return response()->json(['token' => $token]);
    }
    public function me(){
        return response()->json(auth()->user());
    }
}
