<?php

namespace Src\Events\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Events\Application\Commands\CreateEventCommand;
use Src\Events\Application\Handlers\CreateEventCommandHandler;

class CreateEventController
{
    public function __invoke(Request $request, CreateEventCommandHandler $handler): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'sometimes|string|max:255',
        ]);

        $command = new CreateEventCommand(
            title: $validated['title'],
            description: $validated['description'],
            startDate: $validated['start_date'],
            endDate: $validated['end_date'],
            location: $validated['location'] ?? null
        );

        $result = $handler->handle($command);

        return response()->json($result, 201);
    }
}
