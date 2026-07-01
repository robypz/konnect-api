<?php

namespace Src\Communication\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Communication\Application\Commands\CreateChatCommand;
use Src\Communication\Application\Handlers\CreateChatCommandHandler;

class CreateChatController
{
    public function __invoke(Request $request, CreateChatCommandHandler $handler): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'sometimes|string',
            'participant_ids' => 'sometimes|array',
            'participant_ids.*' => 'required|string',
        ]);

        $command = new CreateChatCommand(
            userId: auth()->id(),
            name: $validated['name'],
            description: $validated['description'] ?? null,
            participantIds: $validated['participant_ids'] ?? []
        );

        $result = $handler->handle($command);

        return response()->json($result, 201);
    }
}
