<?php

namespace Src\HR\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Src\HR\Application\Commands\DeleteDepartmentCommand;
use Src\HR\Application\Handlers\DeleteDepartmentCommandHandler;

class DeleteDepartmentController
{
    public function __construct(
        private DeleteDepartmentCommandHandler $handler,
    ) {
    }

    public function __invoke(string $departmentId): JsonResponse
    {
        $command = new DeleteDepartmentCommand($departmentId);
        $this->handler->handle($command);

        return response()->json([
            'message' => 'Department deleted successfully',
        ]);
    }
}
