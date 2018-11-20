<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Post $post) 
    {
        $validated = request()->validate([
            'title' => 'min:3|max:255|required',
            'article' => 'required',
            'tag' => 'min:2|required|max:255'
        ]);
        $validated['user_id'] = auth()->id();
        $validated['author'] = auth()->user()->username;
        $post->create($validated);
        //IT'S NECESSARY SAVE POST THINGS ON POST_TAG
        return view('home');
    }
}
