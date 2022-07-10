<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Retrieve all comments based off the post id
    public function index($id)
    {
        return Comment::where('post_id' === $id)->getr();
    }

    public function store(Request $request)
    {
        return Comment::create([
            'post_id' => $request->input(key: 'post_id'),
            'text' => $request->input(key: 'text')
        ]);
    }
}
