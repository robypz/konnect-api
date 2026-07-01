<?php

namespace Src\Collaboration\Application\Handlers;

use App\Models\Post;
use App\Models\Reaction;
use Src\Collaboration\Application\Commands\ReactToPostCommand;

class ReactToPostCommandHandler
{
    public function handle(ReactToPostCommand $command): array
    {
        $post = Post::find($command->postId);

        if (!$post) {
            throw new \Exception('Post not found');
        }

        $reaction = Reaction::updateOrCreate(
            [
                'post_id' => $command->postId,
                'user_id' => $command->userId,
            ],
            [
                'type' => $command->reactionType,
            ]
        );

        return [
            'message' => 'Reaction added successfully',
            'post_id' => $command->postId,
            'user_id' => $command->userId,
            'type' => $command->reactionType,
        ];
    }
}
