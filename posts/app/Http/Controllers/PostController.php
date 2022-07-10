<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    // We want all post
    public function index()
    {
        # Grab all posts
        $posts =  Post::all();  

        # Then for each post send an internal HTTP request to the 
        # comments microservice for the comments based off each post
        foreach ($posts as $post)
        {
            $post->comments = Http::get("http://localhost:8001/api/posts/{$post->id}/comments")->json();
        }

        return $posts;  
    }

    public function store(Request $request)
    {
        return Post::create([
            'title' => $request->input(key: 'title'),
            'description' => $request->input(key: 'description')
        ]);
    }
}
