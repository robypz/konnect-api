<?php

namespace Src\HR\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\HR\Application\Commands\UpdateDepartmentCommand;
use Src\HR\Application\Handlers\UpdateDepartmentCommandHandler;

class UpdateDepartmentController
{
    public function __construct(
        private UpdateDepartmentCommandHandler $handler,
    ) {
    }

    public function __invoke(Request $request, string $departmentId): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'nullable|string|unique:departments,name,' . $departmentId,
            'description' => 'nullable|string',
        ]);

        $command = new UpdateDepartmentCommand(
            departmentId: $departmentId,
            name: $validated['name'] ?? null,
            description: $validated['description'] ?? null,
        );

        $this->handler->handle($command);

        return response()->json([
            'message' => 'Department updated successfully',
        ]);
    }
}
