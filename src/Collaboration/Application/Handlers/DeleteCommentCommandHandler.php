<?php

namespace Src\Collaboration\Application\Handlers;

use App\Models\Comment;
use Src\Collaboration\Application\Commands\DeleteCommentCommand;

class DeleteCommentCommandHandler
{
    public function handle(DeleteCommentCommand $command): array
    {
        $comment = Comment::find($command->commentId);

        if (!$comment) {
            throw new \Exception('Comment not found');
        }

        $comment->delete();

        return [
            'message' => 'Comment deleted successfully',
            'id' => $command->commentId,
        ];
    }
}
