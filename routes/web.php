<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
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


Route::get('/', [TopicController::class, 'home'])->name('home');



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
Route::get('/tags', [TagController::class, 'listAllTags'])->name('listAllTags');
Route::get('/categories', [CategoryController::class, 'listAllCategories'])->name('listAllCategories');


Route::match(
    ['get', 'post'],
    '/create',
    [TopicController::class, 'create']
)->name('create');

Route::match(
    ['get', 'post'],
    '/createtag',
    [TagController::class, 'createtag']
)->name('createtag');

Route::match(
    ['get', 'post'],
    '/createcategory',
    [CategoryController::class, 'createcategory']
)->name('createcategory');

Route::middleware('auth')->group(function() {
    Route::get('/users', [UserController::class, 'listAllUsers'])->name('listAllUsers');
    Route::get('/users/{uid}', [UserController::class, 'listUsersByID'])->name('listUsersByID');
    /*Route::get('/users/edit', [UserController::class, 'editUserByID'])->name('editUserByID'););*/
    Route::get('/users/profile', [UserController::class, 'editUserByID'])->name('editUserByID');//Edição é aqui

    // Route::get('/topics/{uid}', [TopicController::class, 'listTopicsByID'])->name('listTopicsByID');
    Route::get('/topics/{uid}', [TopicController::class, 'listTopicsByID'])->name('edit_topic');//Aqui
    //Criar uma nova rota com PUT para pegar o ID e direcionar a função de edição.
    Route::get('topics_profile', [TopicController::class, 'topics_profile'])->name('topics_profile');
    
    Route::get('/tags/{uid}', [TagController::class, 'listTagsByID'])->name('edit_tag');//Aqui
    /*Route::get('/search', [UserController::class, 'listUsersByID'])->name('listUsersByID');*/
    Route::get('/category/{uid}', [CategoryController::class, 'listCategoryByID'])->name('edit_category');//Aqui

    Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logoutUser');
    Route::match(
        ['put', 'get', 'post'],'/users/{uid}/edit', 
        [UserController::class, 'editUserByID'])->name('editUserByID');
    Route::delete('/users/{uid}/delete', [UserController::class, 'deleteUserByID'])->name('deleteUserByID');
});