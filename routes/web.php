<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
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

//Route::match(['get', 'post'], '/', [HomeController::class, 'HomeForum'])->name('forum');

Route::resource('categories', CategoryController::class);

Route::match(['get', 'post'], '/', [TopicController::class, 'home'])->name('home');



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
    '/createCategory',
    [CategoryController::class, 'createCategory']
)->name('createCategory');

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
    Route::put('/tags/{uid}', [TagController::class, 'editTagByID'])->name('edit_tag');//Aqui
    /*Route::get('/search', [UserController::class, 'listUsersByID'])->name('listUsersByID');*/
    Route::get('/category/{uid}', [CategoryController::class, 'listCategoryByID'])->name('edit_category');//Aqui
    Route::put('/category/{uid}', [CategoryController::class, 'editCategoryByID'])->name('editCategoryByID');//Aqui



    Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logoutUser');
    Route::match(
        ['put', 'get', 'post'],'/users/{uid}/edit', 
        [UserController::class, 'editUserByID'])->name('editUserByID');
    Route::delete('/users/{uid}/delete', [UserController::class, 'deleteUserByID'])->name('deleteUserByID');

    Route::delete('/tags/{uid}/delete', [TagController::class, 'deleteTagByID'])->name('deleteTagByID');

    Route::delete('/categories/{uid}/delete', [CategoryController::class, 'deleteCategoryByID'])->name('deleteCategoryByID');  
});
/*
Route::resource('/category', CategoryController::class)->names[(
    'index' => 'category.index',
    'store' => 'category.store',
)];
*/
/*
Route::get('/', [TopicController::class, 'showTopics'])->name('home');

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');

Route::match(['get', 'post'], '/register', [UserController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/users', [UserController::class, 'listAllUsers'])->name('listAllUsers');
    Route::get('/users/{id}', [UserController::class, 'listUserById'])->name('listUserById');
    Route::put('/users/{id}/update', [UserController::class, 'updateUser'])->name('updateUser');
    Route::get('/users/{id}/edit', [UserController::class, 'editUser'])->name('editUser');
    Route::delete('/users/{id}/delete', [UserController::class, 'deleteUser'])->name('deleteUser');

    Route::get('/topics', [TopicController::class, 'listAllTopics'])->name('listAllTopics');
    Route::get('/topics/{id}', [TopicController::class, 'listTopicById'])->name('listTopicById');
    Route::post('/topics', [TopicController::class, 'createTopic'])->name('createTopic');
    Route::put('/topics/{id}/update', [TopicController::class, 'updateTopic'])->name('updateTopic');
    Route::get('/topics/{id}/edit', [TopicController::class, 'editTopic'])->name('editTopic');
    Route::get('/topics/{id}/delete', [TopicController::class, 'deleteTopic'])->name('deleteTopic');

    Route::get('/posts', [PostController::class, 'listAllPosts'])->name('listAllPosts');
    Route::post('/posts', [PostController::class, 'store'])->name('storePost');
    Route::get('/posts/{id}/edit', [PostController::class, 'editPost'])->name('editPost');
    Route::put('/posts/{id}/update', [PostController::class, 'updatePost'])->name('updatePost');
    Route::get('/posts/{id}', [PostController::class, 'deletePost'])->name('deletePost');


    Route::get('/tags', [TagController::class, 'listAllTags'])->name('listAllTags');
    Route::get('/tags/{id}', [TagController::class, 'listTagById'])->name('listTagById');
    Route::post('/tags/create', [TagController::class, 'createTag'])->name('createTag');
    Route::put('/tags/{id}/update', [TagController::class, 'updateTag'])->name('updateTag');
    Route::get('/tags/{id}/edit', [TagController::class, 'editTag'])->name('editTag');
    Route::get('/tags/{id}/delete', [TagController::class, 'deleteTag'])->name('deleteTag');

    Route::get('/comments', [CommentController::class, 'listAllComments'])->name('listAllComments');
    Route::get('/comments/{id}', [CommentController::class, 'listCommentById'])->name('listCommentById');
    Route::post('/comments/create', [CommentController::class, 'createComment'])->name('createComment');
    Route::put('/comments/{id}/update', [CommentController::class, 'updateComment'])->name('updateComment');
    Route::get('/comments/{id}/edit', [CommentController::class, 'editComment'])->name('editComment');
    Route::get('/comments/{id}/delete', [CommentController::class, 'deleteComment'])->name('deleteComment');
    
    Route::get('/categories', [CategoryController::class, 'listAllCategories'])->name('listAllCategories');
    Route::get('/categories/{id}', [CategoryController::class, 'listCategoryById'])->name('listCategoryById');
    Route::post('/categories/create', [CategoryController::class, 'createCategory'])->name('createCategory');
    Route::put('/categories/{id}/update', [CategoryController::class, 'updateCategory'])->name('updateCategory');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'editCategory'])->name('editCategory');
    Route::get('/categories/{id}/delete', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');

    Route::get('/myaccount', [UserController::class, 'myAccount'])->name('myAccount');
    Route::put('/myaccount/update', [UserController::class, 'updateAccount'])->name('updateAccount');
    Route::delete('/myaccount/delete', [UserController::class, 'deleteAccount'])->name('deleteAccount');   
});
*/
