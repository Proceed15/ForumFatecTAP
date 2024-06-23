<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{

    public function home() {
        //Essa função seria um Controller próprio para gerenciar o ID do usuário logado.
        $user_id = Auth::id();
        return view('home', ['authUser' => $user_id]);
    }
    public function layout() {
        //Essa função seria um Controller próprio para gerenciar o ID do usuário logado.
        $user_id = Auth::id();
        return view('layout', ['authUser' => $user_id]);
    }
    // camelCase
    // no_camel_case
    //Lógicas para programar
    public function listAllUsers(){
        $users = User:: all();
        //Lógica pasta.nomedapagina
        return view('users.listAllUsers', ['users' => $users]);
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
        //Procurar o Usuário no Banco.
        $user = User::where('id', $uid)->first();
        //where --> busca 1 campo só, mas retorna um array desse campo.
        //find --> busca vários campos.
        //print($uid);
        //return view('users.listUsersByID');
        $user_id = Auth::id();
        return view('users.profile', ['user' => $user, 'authUser' => $user_id]);
    }


    public function editUserByID(Request $request, $uid){
        $user = User::where('id', $uid)->first();
        //Adicionar validação de dados igual a função do register.
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != '')
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('listAllUsers', [$user->id])->with('message', 'Atualizado com sucesso!');
        //return view('users.editUserByID');
    }
    public function deleteUserByID(Request $request, $uid){
        $user = User::where('id', $uid)->first();
        
        $user->save();
        //return view('users.deleteUserByID');
        return redirect()->route('listUsersByID', [$user->id])->with('message', 'Excluído com sucesso!');
    }
}
