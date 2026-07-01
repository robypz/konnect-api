<?php

namespace Src\Collaboration\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Collaboration\Application\Commands\CreatePostCommand;
use Src\Collaboration\Application\Handlers\CreatePostCommandHandler;

class CreatePostController
{
    public function __invoke(Request $request, CreatePostCommandHandler $handler): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'content' => 'required|string',
        ]);

        $command = new CreatePostCommand(
            userId: auth()->id(),
            title: $validated['title'] ?? null,
            content: $validated['content']
        );

        $result = $handler->handle($command);

        return response()->json($result, 201);
    }
}
