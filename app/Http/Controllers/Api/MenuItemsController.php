<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuItemResource;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemsController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Fetched successfully',
            'data' => MenuItemResource::collection(MenuItem::all())
        ]);
    }
}
