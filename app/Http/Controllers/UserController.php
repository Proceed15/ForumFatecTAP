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
        $users = User:: all();
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
        return view('users.profile', ['user' => $user]);
    }


    public function editUserByID(Request $request, $uid){
        $user = User::where('id', $uid)->first();
        //Adicionar validação de dados igual ao arquivo do register.
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != '')
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('listUsersByID', [$user->id])->with('message', 'Atualizado com sucesso!');
        //return view('users.editUserByID');
    }
    public function deleteUserByID(Request $request, $uid){
        $user = User::where('id', $uid)->first();
        
        $user->save();
        //return view('users.deleteUserByID');
        return redirect()->route('listUsersByID', [$user->id])->with('message', 'Excluído com sucesso!');
    }
}
