<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;

class CommentTree extends Component
{
    public $comments;

    public function mount($comments)
    {
        $this->comments = $comments;
    }

    public function render()
    {
        return view('livewire.comment-tree');
    }
}

