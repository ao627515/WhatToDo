<?php

use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/todos');
Route::post('/todos/toogle/completed', [ToDoController::class, 'toggleCompleted'])->name('todos.toggle.completed');
Route::resource('todos', ToDoController::class);
