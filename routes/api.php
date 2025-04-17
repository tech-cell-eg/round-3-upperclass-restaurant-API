<?php

use App\Http\Controllers\Api\GiftCardsController;
use App\Http\Controllers\Api\MenuItemsController;
use App\Http\Controllers\Api\GetInTouchController;
use Illuminate\Support\Facades\Route;

// Routes
Route::get('menu-items', [MenuItemsController::class, 'index']);

// Gift Cards
Route::get('gift-cards', [GiftCardsController::class, 'index']);
Route::get('gift-cards/{giftCard}', [GiftCardsController::class, 'show']);

// Get In Touch
Route::apiResource('contact', GetInTouchController::class);