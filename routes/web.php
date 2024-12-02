<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CommentController;
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

// AuthController
Route::match(['get', 'post'], '/login', [AuthController::class, 'loginUser'])->name('login');
Route::post('/logout', [AuthController::class, 'logoutUser'])->name('logout');

// UserController
Route::match(['get', 'post'], '/register', [UserController::class, 'registerUser'])->name('register');

// Controlar o usuário
Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'listAllUsers'])->name('ListAllUsers');
    Route::get('/users/{uid}', [UserController::class, 'listUser'])->name('ListUser');
    Route::put('/users/{uid}/edit', [UserController::class, 'updateUser'])->name('UpdateUser');
    Route::delete('/users/{uid}/delete', [UserController::class, 'deleteUser'])->name('DeleteUser');
});

// Rotas Estáticas
Route::get('/criar_topico', function () {
    return view('layouts.criar_topico');
});
Route::get('/visualizar_topico', function () {
    return view('layouts.visualizar_topico');
});

Route::middleware('auth')->group(function () {
    Route::match(['get', 'post'], '/category/create', [CategoryController::class, 'createCategory'])->name('createCategory');
    Route::put('/category/{cid}/edit', [CategoryController::class, 'updateCategory'])->name('UpdateCategory');
    Route::delete('/category/{cid}/delete', [CategoryController::class, 'deleteCategory'])->name('DeleteCategory');
    Route::get('/category/{cid}/edit', [CategoryController::class, 'editCategory'])->name('editCategory');
    Route::get('/categories', [CategoryController::class, 'listAllCategory'])->name('listCategories');
});

// Category

// Visualização sem auth
Route::get('/category', [CategoryController::class, 'listAllCategory'])->name('ListAllCategory');
Route::get('/category/{cid}', [CategoryController::class, 'showCategory'])->name('showCategory');


// Controlar a tag
Route::middleware('auth')->group(function () {

    Route::get('/tags', [TagController::class, 'listAllTags'])->name('listAllTags');
    Route::get('/tags/{tid}', [TagController::class, 'showTag'])->name('showTag');    
    Route::get('/tags/{id}/edit', [TagController::class, 'edit'])->name('editTag');
    Route::put('/tags/{tid}', [TagController::class, 'updateTag'])->name('UpdateTag');
    Route::delete('/tags/{tid}', [TagController::class, 'deleteTag'])->name('DeleteTag');
    Route::get('/tag/create', [TagController::class, 'createTag'])->name('CreateTag');
    Route::post('/tag/create', [TagController::class, 'createTag'])->name('CreateTagPost');
    
});

// Tag
Route::get('/tag', [TagController::class, 'listAllTags'])->name('ListAllTags');
Route::get('/tag/{tid}', [TagController::class, 'showTag'])->name('showTag');


Route::group(['prefix' => 'topics', 'middleware' => ['auth']], function() {
    Route::get('/', [TopicController::class, 'index'])->name('topics.index'); // Rota para listar tópicos
    Route::get('/create', [TopicController::class, 'create'])->name('CreateTopic'); 
    Route::post('/', [TopicController::class, 'store'])->name('topics.store'); 
    Route::get('/{id}/edit', [TopicController::class, 'edit'])->name('topics.edit');
    Route::put('/{id}', [TopicController::class, 'update'])->name('topics.update'); 
    Route::delete('/{id}', [TopicController::class, 'destroy'])->name('topics.destroy'); 
    Route::put('/topics/{id}', [TopicController::class, 'update'])->name('topics.update');
    Route::get('/topics/{id}', [TopicController::class, 'show'])->name('topics.show');
    
    
});


// comment

Route::get('/topics/{topic}/comments', [CommentController::class, 'index'])->name('comments.index');
Route::post('/topics/{topic}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/topics/{id}', [TopicController::class, 'show'])->name('topics.show');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

// like e deslike

Route::post('/comments/{id}/like', [CommentController::class, 'like'])->name('comments.like');
Route::post('/comments/{id}/dislike', [CommentController::class, 'dislike'])->name('comments.dislike');

//rota welcome

Route::get('/', [TopicController::class, 'showAllTopics'])->name('home');