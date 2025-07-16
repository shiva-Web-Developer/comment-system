<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'post_id',
        'parent_comment_id',
        'depth',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id');
    }

    public function replies()
{
    return $this->hasMany(Comment::class, 'parent_comment_id')->with('replies');
}


    protected static function booted()
    {
        static::creating(function ($comment) {
            if ($comment->parent_comment_id) {
                $parent = Comment::find($comment->parent_comment_id);
                $comment->depth = $parent->depth + 1;

                if ($comment->depth > 3) {
                    throw new \Exception('Maximum comment depth reached (3)');
                }
            }
        });
    }


}
