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

    private function createTag($tags, $postId) 
    {
        foreach($tags as $tagName => $id) {
            $tag = ! $id ? $this->create($tagName): $this->modelClass::find($id);
            $tag->posts()->attach([$postId]);
        }
        return $tags;
    }

    public function buildNewTag($tags, $postId) 
    {
        return $this->createTag(
            $this->addTagId(separateCsv($tags)),
            $postId
        );
    }
}