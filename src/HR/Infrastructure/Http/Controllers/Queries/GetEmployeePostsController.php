<?php

namespace Src\HR\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Src\HR\Application\Handlers\GetEmployeePostsQueryHandler;
use Src\HR\Application\Queries\GetEmployeePostsQuery;

class GetEmployeePostsController
{
    public function __construct(
        private GetEmployeePostsQueryHandler $handler,
    ) {
    }

    public function __invoke(string $employeeId): JsonResponse
    {
        $query = new GetEmployeePostsQuery($employeeId);
        $posts = $this->handler->handle($query);

        return response()->json(['data' => $posts]);
    }
}
