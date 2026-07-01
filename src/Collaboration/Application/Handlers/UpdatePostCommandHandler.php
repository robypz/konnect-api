<?php

namespace Src\Collaboration\Application\Handlers;

use App\Models\Post;
use Src\Collaboration\Application\Commands\UpdatePostCommand;

class UpdatePostCommandHandler
{
    public function handle(UpdatePostCommand $command): array
    {
        $post = Post::find($command->postId);

        if (!$post) {
            throw new \Exception('Post not found');
        }

        $updateData = [];
        if ($command->title !== null) {
            $updateData['title'] = $command->title;
        }
        if ($command->content !== null) {
            $updateData['content'] = $command->content;
        }

        $post->update($updateData);

        return [
            'id' => $post->id,
            'user_id' => $post->user_id,
            'title' => $post->title,
            'content' => $post->content,
            'updated_at' => $post->updated_at,
        ];
    }
}
