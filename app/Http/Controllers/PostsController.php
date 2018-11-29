<?php

namespace App\Http\Controllers;

use App\Post;
use App\Traits\CompletePost;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;

class PostsController extends Controller
{
    use CompletePost;

    public function create()
    {
        return view('posts.create');
    }

    public function store(Post $post, PostStoreRequest $request) 
    {
        if (! $this->createFullPost($request->validated())) {
            return back()->withErrors('Could not save your post. Try Again Later.');
        }
        return view('/home');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, PostUpdateRequest $request) 
    {
        $post->update($request->validated());
        return redirect('/home');
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/home');
    }
}
