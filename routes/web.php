<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TopicController;


Route::view('/', 'dashboard');

Route::match(['get', 'post'],'/register', [UserController::class, 'registerUser'])->name('register');
Route::match(['get', 'post'], '/login', [AuthController::class, 'loginUser'])->name('login');
Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logout');

        
Route::group(['prefix' => 'categories'], function() {
// Route::group(['prefix' => 'categories','middleware' => ['auth']], function() {
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{id}/edit', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
    
Route::group(['prefix' => 'topics'], function() {
        Route::get('/', [TopicController::class, 'index'])->name('topics.index');
        Route::get('/create', [TopicController::class, 'create'])->name('topics.create');
        Route::post('/create', [TopicController::class, 'store'])->name('topics.store');
        Route::get('/{id}/edit', [TopicController::class, 'edit'])->name('topics.edit');
        Route::put('/{id}/edit', [TopicController::class, 'update'])->name('topics.update');
        Route::delete('/{id}/destroy', [TopicController::class, 'destroy'])->name('topics.destroy');
});


Route::group(['prefix' => 'categories'], function() {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('categories.show');
});

// php artisan make:controller CategoryController --resource
// Route::resource('categories', CategoryController::class);

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'listAllUsers'])->name('ListAllUsers');
    Route::get('/users/{uid}', [UserController::class, 'listUser'])->name('ListUser');
    Route::put('/users/{uid}/update', [UserController::class, 'updateUser'])->name('UpdateUser');
    Route::delete('/users/{uid}/delete', [UserController::class, 'deleteUser'])->name('DeleteUser');
});



