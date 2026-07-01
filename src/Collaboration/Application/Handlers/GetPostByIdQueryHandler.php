<?php

namespace Src\Collaboration\Application\Handlers;

use App\Models\Post;
use Src\Collaboration\Application\Queries\GetPostByIdQuery;

class GetPostByIdQueryHandler
{
    public function handle(GetPostByIdQuery $query): array
    {
        $post = Post::with(['user', 'comments', 'reactions'])->find($query->postId);

        if (!$post) {
            throw new \Exception('Post not found');
        }

        return [
            'id' => $post->id,
            'user_id' => $post->user_id,
            'title' => $post->title,
            'content' => $post->content,
            'user' => $post->user,
            'comments' => $post->comments,
            'reactions' => $post->reactions,
            'created_at' => $post->created_at,
            'updated_at' => $post->updated_at,
        ];
    }
}
