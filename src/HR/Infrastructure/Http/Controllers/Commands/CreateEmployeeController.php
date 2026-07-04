<?php

namespace Src\HR\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\HR\Application\Commands\CreateEmployeeCommand;
use Src\HR\Application\Handlers\CreateEmployeeCommandHandler;

class CreateEmployeeController
{
    public function __construct(
        private CreateEmployeeCommandHandler $handler,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'department_id' => 'required|integer|exists:departments,id',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $command = new CreateEmployeeCommand(
            departmentId: $validated['department_id'],
            userId: $validated['user_id'] ?? null,
        );

        $employee = $this->handler->handle($command);

        return response()->json([
            'message' => 'Employee created successfully',
            'data' => $employee,
        ], 201);
    }
}