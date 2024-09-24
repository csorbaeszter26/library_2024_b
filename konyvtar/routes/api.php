<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CopyController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users',[UserController::class, 'index']);
Route::get('/user/{id}',[UserController::class, 'show']);
Route::post('/user',[UserController::class, 'store']);


Route::get('/books',[BookController::class, 'index']);
Route::get('/book/{id}',[BookController::class, 'show']);
Route::post('/book',[BookController::class, 'store']);


Route::get('/copies',[CopyController::class, 'index']);
Route::get('/copy/{id}',[CopyController::class, 'show']);
Route::post('/copy',[CopyController::class, 'store']);