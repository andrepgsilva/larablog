<?php

namespace App\Traits;

use Exception;
use App\Post;
use App\Libraries\Tag;
use App\Libraries\PostTag;


trait CompletePost
{
    /**
     * Create a Post with the tags
     * Get request parameter already validated
     */
    public function createFullPost($validated) 
    {
        try {
            $createdTags = (new Tag)->buildNewTag($validated['tag']);
            (new PostTag)->store(
                (new Post)->addPost($validated)->id,
                array_values($createdTags)
            );
        } catch(Exception $e) {
            report($e);
            return false;
        }
        return $createdTags;
    }
}
