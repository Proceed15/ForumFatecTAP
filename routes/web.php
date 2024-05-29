<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'listAllUsers'])->name('listAllUsers');
Route::get('/users/create', [UserController::class, 'createAUser'])->name('createAUser');
Route::get('/users/{uid}', [UserController::class, 'listUsersByID'])->name('listUsersByID');
Route::get('/users/{uid}/edit', [UserController::class, 'editUserByID'])->name('editUserByID');
Route::get('/users/{uid}/delete', [UserController::class, 'deleteUserByID'])->name('deleteUserByID');

//Uso antigo, com é uma tela de login precisa ser match para ter psot imbutido.
//Route::get('/login', [AuthController::class, 'loginUser'])->name('loginUser');

Route::match(
    ['get', 'post'],
    '/login',
    [AuthController::class, 'loginUser']
)->name('loginUser');
