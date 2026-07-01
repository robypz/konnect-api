<?php

namespace Src\HR\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Src\HR\Application\Handlers\GetEmployeeEventsQueryHandler;
use Src\HR\Application\Queries\GetEmployeeEventsQuery;

class GetEmployeeEventsController
{
    public function __construct(
        private GetEmployeeEventsQueryHandler $handler,
    ) {
    }

    public function __invoke(string $employeeId): JsonResponse
    {
        $query = new GetEmployeeEventsQuery($employeeId);
        $events = $this->handler->handle($query);

        return response()->json(['data' => $events]);
    }
}
