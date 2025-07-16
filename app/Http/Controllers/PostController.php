<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
     public function index()
    {
        $post = \App\Models\Post::with('comments.replies')->first();
        return view('post', compact('post'));
    }

    public function storeComment(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required',
            'parent_comment_id' => 'nullable|exists:comments,id',
        ]);

        $depth = 1;
        if ($request->parent_comment_id) {
            $parent = Comment::find($request->parent_comment_id);
            $depth = $parent->depth + 1;
            if ($depth > 3) {
                return back()->with('error', 'Maximum reply depth reached!');
            }
        }

        Comment::create([
            'post_id' => $request->post_id,
            'content' => $request->content,
            'parent_comment_id' => $request->parent_comment_id,
            'depth' => $depth
        ]);

        return back();
    }
}
