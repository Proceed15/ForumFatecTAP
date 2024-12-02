<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;



class AuthController extends Controller
{
    public function loginUser(Request $request) {
        if($request->method() === 'GET'){
        return view('auth.login.login');
        } else {
            $credentials = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);
            if(Auth::attempt($credentials)){
                return redirect()->intended('/')->with('success', 'Login realizado com sucesso.');
            } else {
                return back()->withErrors([
                    'email' => 'Credencias inválidas.',
                ])->withInput();
            }
        }
    }

    public function logoutUser(Request $request) {
        //if($request->method() === 'POST'){} --> Erro de Get para POST resolvido
        Auth::logout();
        return redirect()->intended('/')->with('success', 'Logout realizado com sucesso.');
    }
}
