<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Post extends Model
{
    protected $fillable = [
        'title',
        'article',
        'author',
        'user_id'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function addPost($postInfo) 
    {
        $postInfo['user_id'] = auth()->id();
        $postInfo['author'] = auth()->user()->username;
        return $this->create($postInfo);
    }
}
