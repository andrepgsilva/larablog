<?php

namespace App\Libraries;

use Exception;
use Illuminate\Support\Facades\DB;

class PostTag
{
    // Verify if post already own the tag
    private function verifyPostTag($post_id, $tag_id)
    {
        return DB::table('post_tag')
                ->where('post_id', $post_id)
                ->where('tag_id', $tag_id)
                ->exists();
    }

    // Pass post id & array with id tags
    public function store($post_id, $tags)
    {
        try {
            foreach($tags as $tag) {
                if (! $this->verifyPostTag($post_id, $tag)) {
                    DB::table('post_tag')->insert(
                        [
                            'post_id'=> $post_id, 'tag_id'=>$tag,
                            'created_at'=> now(),
                            'updated_at' => now()
                        ]
                    );
                }
            }
        } catch(Exception $e) {
            report($e);
            dd($e);
            return false;
        }
        return true;
    }
}