<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\GuardarPostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(["user", "category"])->get();
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuardarPostRequest $request)
    {
        $data = $request->all();
        $data["user_id"] = User::all()->random()->id;
        $post = Post::create($data);

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return (new PostResource($post))->additional(['msg' => 'Post creat correctament']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function tomeu()
    {
        return response()->json(['data' => 'Som en Tomeu Sabater.']);
    }
    
}
