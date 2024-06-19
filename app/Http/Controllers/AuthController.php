<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            $credentials = $request->validate([
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:8'
            ]);
            //Auth:attemp -->Vai precisar de dados armazenados para serem recuperados.
            if (Auth::attempt($credentials)) {
                return redirect()
                    ->intended('/users')
                    ->with('success', 'Login realizado com sucesso.');
            }
            return back()->withErrors([
                'email' => 'Credenciais inválidas.',
            ])->withInput();
            /*
            $username = $request->username;
            $password = $request->username;
            $credentials = $request->only('username', 'password');

            print($username . " e " . $password. "<br>");
            print_r($credentials);
            */

        }
    }
    public function logoutUser(Request $request) {
        Auth::logout();
        return redirect()
            ->route('listAllUsers')
            ->with('success', 'Logout realizado com sucesso.');
    }
        
    }
