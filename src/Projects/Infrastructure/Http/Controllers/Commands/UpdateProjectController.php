<?php

namespace Src\Projects\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Projects\Application\Commands\UpdateProjectCommand;
use Src\Projects\Application\Handlers\UpdateProjectCommandHandler;

class UpdateProjectController
{
    public function __invoke(Request $request, string $projectId, UpdateProjectCommandHandler $handler): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after:start_date',
            'status' => 'sometimes|string|in:pending,active,completed,cancelled',
        ]);

        $command = new UpdateProjectCommand(
            projectId: $projectId,
            name: $validated['name'] ?? null,
            description: $validated['description'] ?? null,
            startDate: $validated['start_date'] ?? null,
            endDate: $validated['end_date'] ?? null,
            status: $validated['status'] ?? null
        );

        $result = $handler->handle($command);

        return response()->json($result, 200);
    }
}
