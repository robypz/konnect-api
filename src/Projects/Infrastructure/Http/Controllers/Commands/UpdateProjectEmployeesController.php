<?php

namespace Src\Projects\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Projects\Application\Commands\UpdateProjectEmployeesCommand;
use Src\Projects\Application\Handlers\UpdateProjectEmployeesCommandHandler;

class UpdateProjectEmployeesController
{
    public function __invoke(Request $request, string $projectId, UpdateProjectEmployeesCommandHandler $handler): JsonResponse
    {
        $validated = $request->validate([
            'employee_ids' => 'required|array',
            'employee_ids.*' => 'required|string',
        ]);

        $command = new UpdateProjectEmployeesCommand(
            projectId: $projectId,
            employeeIds: $validated['employee_ids']
        );

        $result = $handler->handle($command);

        return response()->json($result, 200);
    }
}
