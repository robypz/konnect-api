<?php

namespace Src\Collaboration\Application\Handlers;

use App\Models\Post;
use Src\Collaboration\Application\Commands\CreatePostCommand;

class CreatePostCommandHandler
{
    public function handle(CreatePostCommand $command): array
    {
        $post = Post::create([
            'user_id' => $command->userId,
            'title' => $command->title,
            'content' => $command->content,
        ]);

        return [
            'id' => $post->id,
            'user_id' => $post->user_id,
            'title' => $post->title,
            'content' => $post->content,
            'created_at' => $post->created_at,
        ];
    }
}
