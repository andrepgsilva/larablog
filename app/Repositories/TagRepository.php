<?php

namespace App\Repositories;

use App\Tag;

class TagRepository 
{
    protected $modelClass = Tag::class;

    protected function findByField($field, $value) 
    {
        return $this->modelClass::where($field, $value)->first();
    }

    public function create($tagname) 
    {
        return $modeClass::create(['name'=>$tagname]);
    }
}