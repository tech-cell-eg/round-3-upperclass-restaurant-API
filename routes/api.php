<?php

use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CookingClassesController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/tables/create', [BookingController::class, 'bookTable']);
Route::post('/tables/delete', [BookingController::class, 'unBookTable']);

Route::get('/classes', [CookingClassesController::class, 'index']);
Route::get('/classes/{id}', [CookingClassesController::class, 'classDetails']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'postDetails']);
