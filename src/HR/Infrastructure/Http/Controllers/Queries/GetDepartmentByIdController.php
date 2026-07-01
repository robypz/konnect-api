<?php

namespace Src\HR\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Src\HR\Application\Handlers\GetDepartmentByIdQueryHandler;
use Src\HR\Application\Queries\GetDepartmentByIdQuery;

class GetDepartmentByIdController
{
    public function __construct(
        private GetDepartmentByIdQueryHandler $handler,
    ) {
    }

    public function __invoke(string $departmentId): JsonResponse
    {
        $query = new GetDepartmentByIdQuery($departmentId);
        $department = $this->handler->handle($query);

        if (!$department) {
            return response()->json([
                'message' => 'Department not found',
            ], 404);
        }

        return response()->json(['data' => $department]);
    }
}
