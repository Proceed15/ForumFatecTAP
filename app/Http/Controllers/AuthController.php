<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Função de Login para o usuário.
    public function loginUser(Request $request) {
        //A variável Request é um objeto do tipo (secundário) Request.
        //Primários: String, Int, etc.
        //Secundários: Pilha, Fila, Request, etc.
        if($request->method() === 'GET'){
            return view('auth.login');
        } else {
            $username = $request->username;
            $password = $request->username;
            $credentials = $request->only('username', 'password');

            print($username . " e " . $password. "<br>");
            print_r($credentials);

            //Auth:attemp -->Vai precisar de dados armazenados para serem recuperados.
        }
        
    }
}
