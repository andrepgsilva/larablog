<?php

namespace App\Libraries;

use App\Repositories\TagRepository;

class Tag extends TagRepository
{   
    private function addTagId($tags)
    {
        // Array for save tag_names+tag_ids that exists
        $tagsInfo = [];
        foreach ($tags as $tagName) {
            $tag = $this->findByField('name', $tagName);
            $tagsInfo[$tagName] = ! $tag ? $tag : $tag->id;
        }
        return $tagsInfo;
    }

    private function createTag($tags) 
    {
        if(in_array(null, $tags)) {
            foreach($tags as $tagname => $id) {
                if (! $id) {
                    $tag = $this->create($tagname);
                    $tags[$tagname] = $tag->id;
                }
            }
        }
        return $tags;
    }

    public function buildNewTag($tags) 
    {
        return $this->createTag(
            $this->addTagId(separateCsv($tags))
        );
    }
}