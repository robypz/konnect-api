<?php

namespace Src\HR\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Src\HR\Application\Handlers\GetEmployeeTasksQueryHandler;
use Src\HR\Application\Queries\GetEmployeeTasksQuery;

class GetEmployeeTasksController
{
    public function __construct(
        private GetEmployeeTasksQueryHandler $handler,
    ) {
    }

    public function __invoke(string $employeeId): JsonResponse
    {
        $query = new GetEmployeeTasksQuery($employeeId);
        $tasks = $this->handler->handle($query);

        return response()->json(['data' => $tasks]);
    }
}
