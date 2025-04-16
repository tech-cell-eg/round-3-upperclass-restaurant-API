<?php

use App\Http\Controllers\Api\MenuItemsController;
use Illuminate\Support\Facades\Route;

// Routes
Route::get('/menu-items', [MenuItemsController::class, 'index']);