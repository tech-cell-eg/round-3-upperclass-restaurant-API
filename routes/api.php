<?php

use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CookingClassesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/tables/create', [BookingController::class, 'bookTable']);
Route::post('/tables/delete', [BookingController::class, 'unBookTable']);

Route::get('/classes', [CookingClassesController::class, 'index']);
Route::get('/class/{id}', [CookingClassesController::class, 'classDetails']);
