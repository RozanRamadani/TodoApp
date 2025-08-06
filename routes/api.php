<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::post('/todos', [TodoController::class, 'store']);
Route::patch('/todos/{id}', [TodoController::class, 'update']);
Route::delete('/todos/{id}', [TodoController::class, 'delete']);
Route::get('/todos', [TodoController::class, 'index']);
Route::get('/todos/{id}', [TodoController::class, 'show']);
