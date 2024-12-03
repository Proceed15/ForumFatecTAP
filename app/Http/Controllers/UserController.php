<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\facades\Hash;
use Illuminate\Support\facades\Validator;
use App\Models\User;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TopicController;

class UserController extends Controller
{
    public function home() {
        //Essa função é um Controller próprio para gerenciar o ID do usuário logado.
        $user_id = Auth::id();
        return view('home', ['authUser' => $user_id]);
    }
    public function listAllUsers(Request $request) {
        $users = User::all();
        //Lógica pasta.nomedapagina
        return view('users.listAllUsers', ['users' => $users]);
    }

    public function listUser(Request $request, $uid) {
        $user = User::where('id', $uid)->first();
        //$message;
        return view('users.id.listUserById', ['user' => $user]);
    }

    public function updateUser(Request $request, $uid) {
        $user = User::where('id', $uid)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != ''){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('ListUser', [$user->id])
        ->with('message', 'Atualizado com sucesso!');
    }

    public function deleteUser(Request $request, $uid) {
        $user = User::where('id', $uid)->delete();
        return redirect()->intended('/')
        ->with('message', 'Deletado com sucesso!');
    }

    public function registerUser(Request $request) {
        if ($request->method() === 'GET'){
        return view('users.register.registerUser');
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                ]);

            Auth::login($user);

            return redirect()->intended('/')->with('success', 'Registro realizado com sucesso');
        }
    }

    public function editUser() {
        return view('users.id.edit.editUser');
    }


}
