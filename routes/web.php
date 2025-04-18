<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\RegisterUserController;


Route::middleware('guest')->group(function () {
    Route::get('signin', [AuthController::class, 'showLoginForm']);
    Route::post('signin', [AuthController::class, 'signin'])->name('signin');

    Route::get('signup', [RegisterUserController::class, 'create']);
    Route::post('signup', [RegisterUserController::class, 'store'])->name('signup');
});


Route::middleware('auth')->group(function () {
    Route::redirect('/', '/todos');
    Route::redirect('todos/reset', '/todos')->name('todos.reset');
    Route::patch('todos/{todo}/toogle/completed', [ToDoController::class, 'toggleCompleted'])->name('todos.toggle.completed');
    Route::resource('todos', ToDoController::class);

    Route::post('signout', [AuthController::class, 'signout'])->name('signout');

    Route::resource('categories', CategoryController::class)->except(['show', 'create', 'edit']);

    Route::resource('people', PersonController::class);
});
