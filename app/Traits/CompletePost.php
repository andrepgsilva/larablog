<?php

namespace App\Traits;

use Exception;
use App\Post;
use App\Libraries\Tag;
use App\Libraries\PostTag;
use App\Tag as TagModel;

trait CompletePost
{
    /**
     * Create a Post with tags
     * Get request parameter already validated
     */
    public function createFullPost($validated) 
    {
        try {
            $post = (new Post)->addPost($validated);
            $createdTags = (new Tag)->buildNewTag(
                $validated['tag'],
                $post->id
            );
        } catch(Exception $e) {
            report($e);
            return false;
        }
        return true;
    }
}
