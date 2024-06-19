<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopicController;
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
    return view('home');
    //Retorna o Home.
});



//Uso antigo, com é uma tela de login precisa ser match para ter post imbutido.
//Route::get('/login', [AuthController::class, 'loginUser'])->name('loginUser');



Route::match(
    ['get', 'post'],
    '/login',
    [AuthController::class, 'loginUser']
)->name('loginUser');

Route::match(
    ['get', 'post'],
    '/register',
    [UserController::class, 'register']
)->name('register');

Route::get('/topics', [TopicController::class, 'listAllTopics'])->name('listAllTopics');
Route::get('/search', [UserController::class, 'listUsersByID'])->name('listUsersByID');

Route::match(
    ['get', 'post'],
    '/create',
    [TopicController::class, 'create']
)->name('create');

Route::middleware('auth')->group(function() {
    Route::get('/users', [UserController::class, 'listAllUsers'])->name('listAllUsers');
    Route::get('/users/{uid}', [UserController::class, 'listUsersByID'])->name('listUsersByID');
    Route::get('/users/profile', [UserController::class, 'editUserByID'])->name('editUserByID');
    
    Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logoutUser');
    Route::put('/users/{uid}/edit', [UserController::class, 'editUserByID'])->name('editUserByID');
    Route::delete('/users/{uid}/delete', [UserController::class, 'deleteUserByID'])->name('deleteUserByID');
    
});