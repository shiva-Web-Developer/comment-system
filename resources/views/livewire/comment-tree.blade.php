<div>
    @foreach($comments as $comment)
        <div style="margin-left: {{ ($comment->depth - 1) * 30 }}px; border: 1px solid #ccc; padding: 10px; margin-top: 10px;">
            <p>{{ $comment->content }}</p>

            @if ($comment->depth < 3)
                <livewire:comment-form
                    :postId="$comment->post_id"
                    :parentCommentId="$comment->id"
                    :depth="$comment->depth + 1"
                    :key="'form-'.$comment->id" />
            @endif

            @if ($comment->replies->count())
                <livewire:comment-tree
                    :comments="$comment->replies"
                    :key="'tree-'.$comment->id" />
            @endif
        </div>
    @endforeach
</div>
