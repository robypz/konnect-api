<?php

namespace Src\Collaboration\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Collaboration\Application\Commands\UpdatePostCommand;
use Src\Collaboration\Application\Handlers\UpdatePostCommandHandler;

class UpdatePostController
{
    public function __invoke(Request $request, string $postId, UpdatePostCommandHandler $handler): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
        ]);

        $command = new UpdatePostCommand(
            postId: $postId,
            content: $validated['content'] ?? null,
            title: $validated['title'] ?? null
        );

        $result = $handler->handle($command);

        return response()->json($result, 200);
    }
}
