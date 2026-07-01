<?php

namespace Src\Communication\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Communication\Application\Commands\CreateMessageCommand;
use Src\Communication\Application\Handlers\CreateMessageCommandHandler;

class CreateMessageController
{
    public function __invoke(Request $request, string $chatId, CreateMessageCommandHandler $handler): JsonResponse
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $command = new CreateMessageCommand(
            chatId: $chatId,
            userId: auth()->id(),
            content: $validated['content']
        );

        $result = $handler->handle($command);

        return response()->json($result, 201);
    }
}
