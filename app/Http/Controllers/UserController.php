<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//use Validator;
use App\Models\User;
//use App\Http\Controllers\UserController;
use TopicController;

class UserController extends Controller
{

    public function home() {
        //Essa função seria um Controller próprio para gerenciar o ID do usuário logado.
        $user_id = Auth::id();
        return view('home', ['authUser' => $user_id]);
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
                'password' => 'required|string|min:8|confirmed',
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $imageFile = $request->file('photo')->store('images', 'public');
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'photo' => $imageFile,
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
            'password' => 'string|min:3|nullable',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        return ("ok");
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != '')
        {
            $user->password = Hash::make($request->password);
        }
        $imageFile = $request->file('photo')->store('img', 'public');
        $user->save();
        $user_id = Auth::id();
        return redirect()->route('listAllUsers', [$user->id])->with('message', 'Atualizado com sucesso!');
        //return view('users.editUserByID');
    }
    public function deleteUserByID(Request $request, $uid){
        $user = User::where('id', $uid)->delete();;
        
        //$user->save();
        //return view('users.deleteUserByID');
        return redirect()
        ->route('home')
        ->with('message', 'Excluído com sucesso!');
    }
    //Adicionei Mais um s
    public function listsAllUsers(Request $request) {
        // lógica
        return view('user.listAllUsers');
    }

    public function listUser(Request $request, $uid) {
        // procurar o usuário no banco
        $user = User::where('id', $uid)->first();
        return view('user.profile', ['user' => $user]);
    }

    public function updateUser(Request $request, $uid) {
        // procurar o usuário no banco
        $user = User::where('id', $uid)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != '') {
            $user->password = Hash::make($request->password);
        }
        $imageFile = $request->file('photo')->store('img', 'public');
        $user->save();
        return redirect()->route('ListUser', [$user->id])
                ->with('message', 'Atualizado com sucesso!');
    }

    public function deleteUser(Request $request, $uid) {
        User::where('id', $uid)->delete();
        return redirect()->route('ListAllUsers')
                ->with('message', 'Atualizado com sucesso!');
    }

    public function registerUser(Request $request) {
        if ($request->method() === 'GET') {

            return view('user.register');

        } else {
            
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $imageFile = $request->file('photo');
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'photo' => $imageFile,
            ]);
            
            Auth::login($user);

            return redirect()
                    ->route('ListAllUsers')
                    ->with('success', 'Registro realizado com sucesso.');

        }

    }

}


