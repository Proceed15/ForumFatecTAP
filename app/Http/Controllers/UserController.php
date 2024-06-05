<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    // camelCase
    // no_camel_case
    public function listAllUsers(){
        //Lógica pasta.nomedapagina
        return view('users.listAllUsers');
    }

    /*não será maois usado.
    public function createAUser(Request $request){
        return view('users.createAUser');
    }
    */

    public function register(Request $request){
        if($request->method() === 'GET') {
            return view('auth.register');
        } else {

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return redirect()
            ->route('listAllUsers')
            ->with('success', 'Cadastro realizado com sucesso.');
        }
    }

    public function listUsersByID(Request $request, $uid){
        return view('users.listUsersByID');
    }

    public function editUserByID(Request $request, $uid){
        return view('users.editUserByID');
    }
    public function deleteUserByID(Request $request, $uid){
        return view('users.deleteUserByID');
    }
}
