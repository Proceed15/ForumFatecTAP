<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TopicController;

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
//AuthControler
Route::match (
    ['get', 'post'],
    '/login',
    [AuthController::class, 'loginUser']
)->name('login');
Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logout');

//UserController
Route::match (
    ['get', 'post'],
    '/register',
    [UserController::class, 'registerUser']
)->name('register');

//Controlar o usuario
Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'listAllUsers'])->name('ListAllUsers');
    Route::get('/users/{uid}', [UserController::class, 'listUser'])->name('ListUser');
    //Route::get('/users/{uid}/edit', [UserController::class, 'editUser'])->name('routeEditUser');
    //Route::get('/users/{uid}/delete', [UserController::class, 'deleteUser'])->name('routeDeleteUser');
    Route::put('/users/{uid}/edit',
    [UserController::class, 'updateUser'])->name('UpdateUser');
    
    Route::delete('/users/{uid}/delete',
    [UserController::class, 'deleteUser'])->name('DeleteUser');
});

//Routes Estaticos
Route::get('/criar_topico', function () {
    return view('layouts.criar_topico');
});
Route::get('/visualizar_topico', function () {
    return view('layouts.visualizar_topico');
});

//Category
//Visualização sem auth
Route::get('/category', [CategoryController::class, 'listAllCategory'])->name('ListAllCategory');
Route::get('/category/{cid}', [CategoryController::class, 'showCategory'])->name('showCategory');

//Controlar a categoria
Route::middleware('auth')->group(function () {

    Route::match (
        ['get', 'post'],
        '/createcat',
        [CategoryController::class, 'createCategory']
    )->name('CreateCategory');
    
    Route::put('/category/{cid}/edit',
    [CategoryController::class, 'updateCategory'])->name('UpdateCategory');

    Route::delete('/category/{cid}/delete',
    [CategoryController::class, 'deleteCategory'])->name('DeleteCategory');
});

//Tag
Route::get('/tag', [TagController::class, 'listAllTags'])->name('ListAllTags');
Route::get('/tag/{tid}', [TagController::class, 'showTag'])->name('showTag');

//Controlar a tag
Route::middleware('auth')->group(function () {

    Route::match (
        ['get', 'post'],
        '/createtag',
        [TagController::class, 'createTag']
    )->name('CreateTag');
    
    Route::put('/tag/{tid}/edit',
    [TagController::class, 'updateTag'])->name('UpdateTag');

    Route::delete('/tag/{tid}/delete',
    [TagController::class, 'deleteTag'])->name('DeleteTag');
});


//Topic
Route::get('/topic', [TopicController::class, 'listAllTopics'])->name('ListAllTopics');
Route::get('/topic/{tid}', [TopicController::class, 'showTopic'])->name('showTopic');

//Controlar o topic
Route::middleware('auth')->group(function () {

    Route::match (
        ['get', 'post'],
        '/createtopic',
        [TopicController::class, 'createTopic']
    )->name('CreateTopic');
    
    Route::put('/topic/{tid}/edit',
    [TopicController::class, 'updateTopic'])->name('UpdateTopic');

    Route::delete('/topic/{tid}/delete',
    [TopicController::class, 'deleteTopic'])->name('DeleteTopic');
});
