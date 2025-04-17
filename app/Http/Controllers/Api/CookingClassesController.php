<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Class\ClassesResource;
use App\Http\Resources\Class\ClassResource;
use App\Models\CookingClass;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CookingClassesController extends Controller
{
    use ApiResponse;
    public function index(){

        $classes = CookingClass::all();

        return $this->successResponse(ClassesResource::collection($classes), 'Get all classes successfully');
    }

    public function classDetails($id)
    {
        $class = CookingClass::with('teacher')->find($id);

        if(!$class){
            return $this->errorResponse('Class not found.',404);
        }

        return $this->successResponse( new ClassResource($class), 'Class details information');
    }
}
