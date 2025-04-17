<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Post\PostsResource;
use App\Models\Post;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use ApiResponse;

    public function index(){

        $posts = Post::all();

        return $this->successResponse(PostsResource::collection($posts), 'Get all posts successfully');
    }

    public function postDetails($id)
    {
        $class = Post::find($id);

        if(!$class){
            return $this->errorResponse('Post not found.',404);
        }

        return $this->successResponse( new PostResource($class), 'Post details information');
    }
}
