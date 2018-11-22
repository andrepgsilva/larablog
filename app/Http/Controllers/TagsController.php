<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function separateTags($tags)
    {
        if ($tags) {
            $tags = explode(',', $tags);
            if (! $tags) {
                return false;
            }   
        }
        return $tags; 
    }
    
    public function verifyTagExistence($tags)
    {
        // Array for save tag_names+ tag_ids that exists
        $tagsInfo = [];
        for ($i = 0; $i < count($tags); $i++) {
            $trimmedTag = trim($tags[$i]);
            $tagVerified = Tag::where('name', $trimmedTag)->first();
            if (! $tagVerified) {
                // Add null value for inexistent tags 
                $tagsInfo[$tags[$i]] = null;
                continue;
            }
            $tagsInfo[$tags[$i]] = $tagVerified->id;
        }
        return $tagsInfo;
    }
}
