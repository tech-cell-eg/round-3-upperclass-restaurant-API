<?php

use App\Http\Controllers\Api\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/tables/create', [BookingController::class, 'bookTable']);
Route::post('/tables/delete', [BookingController::class, 'unBookTable']);
