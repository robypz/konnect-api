<?php

namespace Src\Collaboration\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Collaboration\Application\Commands\CreateCommentCommand;
use Src\Collaboration\Application\Handlers\CreateCommentCommandHandler;

class CreateCommentController
{
    public function __invoke(Request $request, string $postId, CreateCommentCommandHandler $handler): JsonResponse
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $command = new CreateCommentCommand(
            postId: $postId,
            userId: auth()->id(),
            content: $validated['content']
        );

        $result = $handler->handle($command);

        return response()->json($result, 201);
    }
}
