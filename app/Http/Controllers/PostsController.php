<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $post = $post->create($validated);
        $separatedTags = (new TagsController)->separateTags($validated['tag']);
        $verifiedTags = (new TagsController)->verifyTagExistence($separatedTags);
        if(in_array(null, $verifiedTags)) {
            foreach($verifiedTags as $tagname => $id) {
                if (! $id) {
                    $tag = new Tag();
                    $tag->name = $tagname;
                    $tag->save();
                    $verifiedTags[$tagname] = $tag->id;
                }
            }
        }
        (new PostTagController())->store(
            $post->id, 
            array_values($verifiedTags)
        );
        return view('home');
    }
}
