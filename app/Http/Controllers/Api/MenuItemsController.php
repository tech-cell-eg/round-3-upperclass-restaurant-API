<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuItemResource;
use App\Models\MenuItem;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class MenuItemsController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return $this->successResponse(MenuItemResource::collection(MenuItem::all()), 'Menu Items');
    }
}
