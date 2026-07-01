<?php

namespace Src\Events\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Events\Application\Commands\UpdateEventCommand;
use Src\Events\Application\Handlers\UpdateEventCommandHandler;

class UpdateEventController
{
    public function __invoke(Request $request, string $eventId, UpdateEventCommandHandler $handler): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after:start_date',
            'location' => 'sometimes|string|max:255',
        ]);

        $command = new UpdateEventCommand(
            eventId: $eventId,
            title: $validated['title'] ?? null,
            description: $validated['description'] ?? null,
            startDate: $validated['start_date'] ?? null,
            endDate: $validated['end_date'] ?? null,
            location: $validated['location'] ?? null
        );

        $result = $handler->handle($command);

        return response()->json($result, 200);
    }
}
