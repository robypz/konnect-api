<?php

namespace Src\Projects\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Projects\Application\Commands\AddTaskToProjectCommand;
use Src\Projects\Application\Handlers\AddTaskToProjectCommandHandler;

class AddTaskToProjectController
{
    public function __invoke(Request $request, string $projectId, AddTaskToProjectCommandHandler $handler): JsonResponse
    {
        $validated = $request->validate([
            'task_id' => 'required|string',
        ]);

        $command = new AddTaskToProjectCommand(
            projectId: $projectId,
            taskId: $validated['task_id']
        );

        $result = $handler->handle($command);

        return response()->json($result, 200);
    }
}
