<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function store(Request $request, Website $website)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()->all()], 422);
        }

        $validatedData = $validator->validated();
        $post = new Post();
        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];
        $website->posts()->save($post);

        return response()->json(['message' => 'Post created successfully.']);
    }
}
