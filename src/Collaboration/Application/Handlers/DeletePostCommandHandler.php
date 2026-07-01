<?php

namespace Src\Collaboration\Application\Handlers;

use App\Models\Post;
use Src\Collaboration\Application\Commands\DeletePostCommand;

class DeletePostCommandHandler
{
    public function handle(DeletePostCommand $command): array
    {
        $post = Post::find($command->postId);

        if (!$post) {
            throw new \Exception('Post not found');
        }

        $post->delete();

        return [
            'message' => 'Post deleted successfully',
            'id' => $command->postId,
        ];
    }
}
