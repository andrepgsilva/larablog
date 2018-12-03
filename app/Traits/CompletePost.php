<?php

namespace App\Traits;

use App\Post;
use Exception;
use App\Libraries\Tag;
use App\Tag as TagModel;
use App\Libraries\PostTag;
use Illuminate\Support\Facades\DB;

trait CompletePost
{
    /**
     * Create a Post with tags
     * Get request parameter already validated
     */
    public function createFullPost($validated)
    {
        try {
            DB::transaction(function() use ($validated){
                $post = (new Post())->addPost($validated);
                $createdTags = (new Tag)->buildNewTag(
                    $validated['tag'],
                    $post->id
                );
            });
        } catch(Exception $e) {
            report($e);
            dd($e);
            return false;
        }
        return true;
    }
}
