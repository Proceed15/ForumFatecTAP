<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // camelCase
    // no_camel_case
    public function listAllUsers(Request $request){
        //Lógica pasta.nomedapagina
        return view('users.listAllUsers');
    }

    public function createAUser(Request $request){
        return view('users.createAUser');
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
