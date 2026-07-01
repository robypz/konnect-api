<?php

namespace Src\Collaboration\Application\Handlers;

use App\Models\Comment;
use Src\Collaboration\Application\Commands\CreateCommentCommand;

class CreateCommentCommandHandler
{
    public function handle(CreateCommentCommand $command): array
    {
        $comment = Comment::create([
            'post_id' => $command->postId,
            'user_id' => $command->userId,
            'content' => $command->content,
        ]);

        return [
            'id' => $comment->id,
            'post_id' => $comment->post_id,
            'user_id' => $comment->user_id,
            'content' => $comment->content,
            'created_at' => $comment->created_at,
        ];
    }
}
