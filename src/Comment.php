<?php

namespace Plugins\Story\Comment;

use Story\Cms\Model;

class Comment extends Model
{
    const PENDING = 0;
    const PUBLISH = 1;

    protected $table = 'comments';
    protected $fillable = [
        'name', 'email', 'comment', 'status', 'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(resolve(\Story\Cms\Contracts\StoryPost::class));
    }
}
