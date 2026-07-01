<?php

namespace Src\Collaboration\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Collaboration\Application\Queries\ListPostsQuery;
use Src\Collaboration\Application\Handlers\ListPostsQueryHandler;

class ListPostsController
{
    public function __invoke(Request $request, ListPostsQueryHandler $handler): JsonResponse
    {
        $query = new ListPostsQuery(
            page: $request->query('page', 1),
            perPage: $request->query('per_page', 15)
        );

        $result = $handler->handle($query);

        return response()->json($result, 200);
    }
}
