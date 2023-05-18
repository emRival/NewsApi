<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentControler;
use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/posts/{id}', [PostsController::class, 'show']);
Route::get('/posts', [PostsController::class, 'index']);
Route::post('/posts', [PostsController::class, 'store']);
Route::patch('/posts/{id}', [PostsController::class, 'update']);
Route::delete('/posts/{id}', [PostsController::class, 'delete']);

Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/me', [AuthController::class, 'me']);

Route::post('/comment', [CommentControler::class, 'store']);
Route::patch('/comment/{id}', [CommentControler::class, 'update']);
Route::delete('/comment/{id}', [CommentControler::class, 'delete']);

