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

    }

    public function createUser(){

    }

    public function editUserByID(){

    }
    public function deleteUserByID(){

    }
}
