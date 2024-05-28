<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/users/listid', [UserController::class, 'listUsersByID'])->name('listUsersByID');

Route::get('/users/editid', [UserController::class, 'editUserByID'])->name('editUserByID');

Route::get('/users/deleteid', [UserController::class, 'deleteUserByID'])->name('deleteUserByID');
