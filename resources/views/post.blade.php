<!DOCTYPE html>
<html>
<head>
    <title>Livewire Comments</title>
    @livewireStyles
    <style>
        body { font-family: sans-serif; padding: 20px; }
        textarea { width: 100%; }
    </style>
</head>
<body>

    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <h3>Add a Comment:</h3>
    <livewire:comment-form :postId="$post->id" />

    <h3>All Comments:</h3>
    <livewire:comment-tree :comments="$post->comments" />

    @livewireScripts
</body>
</html>
