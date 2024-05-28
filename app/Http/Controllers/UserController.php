<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // camelCase
    // no_camel_case
    public function listAllUsers(){
        //Lógica pasta.nomedapagina
        return view('users.listAllUsers');
    }

    public function listUsersByID(){
        return view('users.listUsersByID');
    }

    public function createAUser(){
        return view('users.createAUser');
    }

    public function editUserByID(){
        return view('users.editUserByID');
    }
    public function deleteUserByID(){
        return view('users.deleteUserByID');
    }
}
