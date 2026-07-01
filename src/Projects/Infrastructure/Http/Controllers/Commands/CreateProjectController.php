<?php

namespace Src\Projects\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Projects\Application\Commands\CreateProjectCommand;
use Src\Projects\Application\Handlers\CreateProjectCommandHandler;

class CreateProjectController
{
    public function __invoke(Request $request, CreateProjectCommandHandler $handler): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'sometimes|string|in:pending,active,completed,cancelled',
        ]);

        $command = new CreateProjectCommand(
            name: $validated['name'],
            description: $validated['description'],
            startDate: $validated['start_date'],
            endDate: $validated['end_date'],
            status: $validated['status'] ?? 'pending'
        );

        $result = $handler->handle($command);

        return response()->json($result, 201);
    }
}
