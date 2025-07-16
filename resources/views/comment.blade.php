<div class="comment-box">
    <p>{{ $comment->content }}</p>

    @if ($comment->depth < 3)
        <form method="POST" action="{{ route('comment.store') }}">
            @csrf
            <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
            <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
            <textarea name="content" rows="2" required placeholder="Reply..."></textarea>
            <button type="submit">Reply</button>
        </form>
    @endif

    @foreach ($comment->replies as $reply)
        <div class="reply-box">
            @include('comment', ['comment' => $reply])
        </div>
    @endforeach
</div>
