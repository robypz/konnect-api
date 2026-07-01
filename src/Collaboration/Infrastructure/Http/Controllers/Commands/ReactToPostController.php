<?php

namespace Src\Collaboration\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Collaboration\Application\Commands\ReactToPostCommand;
use Src\Collaboration\Application\Handlers\ReactToPostCommandHandler;

class ReactToPostController
{
    public function __invoke(Request $request, string $postId, ReactToPostCommandHandler $handler): JsonResponse
    {
        $validated = $request->validate([
            'type' => 'required|string|in:like,love,haha,wow,sad,angry',
        ]);

        $command = new ReactToPostCommand(
            postId: $postId,
            userId: auth()->id(),
            reactionType: $validated['type']
        );

        $result = $handler->handle($command);

        return response()->json($result, 200);
    }
}
