<?php

namespace Src\HR\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Src\HR\Application\Handlers\GetEmployeeProjectsQueryHandler;
use Src\HR\Application\Queries\GetEmployeeProjectsQuery;

class GetEmployeeProjectsController
{
    public function __construct(
        private GetEmployeeProjectsQueryHandler $handler,
    ) {
    }

    public function __invoke(string $employeeId): JsonResponse
    {
        $query = new GetEmployeeProjectsQuery($employeeId);
        $projects = $this->handler->handle($query);

        return response()->json(['data' => $projects]);
    }
}
