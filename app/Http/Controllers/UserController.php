<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function home() {
        // Essa função é um Controller próprio para gerenciar o ID do usuário logado.
        $user_id = Auth::id();
        return view('home', ['authUser' => $user_id]);
    }

    public function listAllUsers(Request $request) {
        $users = User::all();
        return view('users.listAllUsers', compact('users')); //['user' => $users]
    }

    public function listUser(Request $request, $uid) {
        $user = User::where('id', $uid)->first();
        return view('users.id.listUserById', ['user' => $user]);
    }

    public function updateUser(Request $request, $uid) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'string|min:3|nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::where('id', $uid)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }

if ($request->hasFile('photo')) {
    if ($user->photo) {
        Storage::disk('public')->delete($user->photo); // Remove a imagem antiga
    }
    $imagePath = $request->file('photo')->store('images/', 'public');
    $user->photo = $imagePath;
}

        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->password)) {
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
        if ($request->method() === 'GET') {
            return view('users.register.registerUser');
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

if ($request->hasFile('photo')) {
    $imagePath = $request->file('photo')->store('images/', 'public');
    $user->photo = $imagePath;
    $user->save();
}

            Auth::login($user);

            return redirect()->intended('/')->with('success', 'Registro realizado com sucesso');
        }
    }

    public function editUser() {
        return view('users.id.edit.editUser');
    }
}
