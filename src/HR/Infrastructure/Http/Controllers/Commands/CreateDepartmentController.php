<?php

namespace Src\HR\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\HR\Application\Commands\CreateDepartmentCommand;
use Src\HR\Application\Handlers\CreateDepartmentCommandHandler;

class CreateDepartmentController
{
    public function __construct(
        private CreateDepartmentCommandHandler $handler,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:departments',
            'description' => 'nullable|string',
        ]);

        $command = new CreateDepartmentCommand(
            name: $validated['name'],
            description: $validated['description'] ?? null,
        );

        $department = $this->handler->handle($command);

        return response()->json([
            'message' => 'Department created successfully',
            'data' => $department,
        ], 201);
    }
}
