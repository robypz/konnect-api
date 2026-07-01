<?php

namespace Src\Projects\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Projects\Application\Queries\ListProjectsQuery;
use Src\Projects\Application\Handlers\ListProjectsQueryHandler;

class ListProjectsController
{
    public function __invoke(Request $request, ListProjectsQueryHandler $handler): JsonResponse
    {
        $query = new ListProjectsQuery(
            page: $request->query('page', 1),
            perPage: $request->query('per_page', 15)
        );

        $result = $handler->handle($query);

        return response()->json($result, 200);
    }
}
