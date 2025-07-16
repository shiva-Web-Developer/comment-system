<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;

class CommentForm extends Component
{
    public $postId;
    public $parentCommentId = null;
    public $depth = 1;
    public $content;

    public function save()
    {
        $this->validate([
            'content' => 'required|string|max:500',
        ]);

        if ($this->depth > 3) return;

        Comment::create([
            'post_id' => $this->postId,
            'parent_comment_id' => $this->parentCommentId,
            'depth' => $this->depth,
            'content' => $this->content
        ]);

        $this->content = '';
        $this->dispatch('refresh-comments'); // optional
    }

    public function render()
    {
        return view('livewire.comment-form');
    }
}

