<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGetInTouchRequest;
use App\Http\Requests\UpdateGetInTouchRequest;
use App\Models\GetInTouch;
use App\Traits\ApiResponse;

class GetInTouchController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check if user is authenticated or not when implementing auth
        return $this->successResponse(GetInTouch::all(), 'Get In Touch Data');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGetInTouchRequest $request)
    {
        $getInTouch = GetInTouch::create($request->validated());

        return $this->successResponse($getInTouch, 'Stored Get In Touch Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(GetInTouch $getInTouch)
    {
        // Check if user is authenticated or not when implementing auth
        return $this->successResponse($getInTouch, 'Get In Touch Data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGetInTouchRequest $request, GetInTouch $getInTouch)
    {
        // Check if user is authenticated or not when implementing auth
        $getInTouch->update($request->validated());

        return $this->successResponse($getInTouch, 'Updated Get In Touch Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GetInTouch $getInTouch)
    {
        // Check if user is authenticated or not when implementing auth
        $getInTouch->delete();

        return $this->successResponse($getInTouch, 'Deleted Get In Touch Successfully');
    }
}
