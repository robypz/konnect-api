<?php

namespace Src\Projects\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Projects\Application\Queries\ListProjectsByEmployeeQuery;
use Src\Projects\Application\Handlers\ListProjectsByEmployeeQueryHandler;

class ListProjectsByEmployeeController
{
    public function __invoke(Request $request, string $employeeId, ListProjectsByEmployeeQueryHandler $handler): JsonResponse
    {
        $query = new ListProjectsByEmployeeQuery(
            employeeId: $employeeId,
            page: $request->query('page', 1),
            perPage: $request->query('per_page', 15)
        );

        $result = $handler->handle($query);

        return response()->json($result, 200);
    }
}
