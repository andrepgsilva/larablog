<?php

namespace App\Http\Controllers;

use App\Post;
use App\Libraries\Tag;
use App\Libraries\PostTag;
use App\Traits\CompletePost;
use App\Http\Requests\PostStoreRequest;

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
}
