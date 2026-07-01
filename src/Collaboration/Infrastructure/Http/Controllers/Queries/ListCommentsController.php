<?php

namespace Src\Collaboration\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Collaboration\Application\Queries\ListCommentsQuery;
use Src\Collaboration\Application\Handlers\ListCommentsQueryHandler;

class ListCommentsController
{
    public function __invoke(Request $request, string $postId, ListCommentsQueryHandler $handler): JsonResponse
    {
        $query = new ListCommentsQuery(
            postId: $postId,
            page: $request->query('page', 1),
            perPage: $request->query('per_page', 15)
        );

        $result = $handler->handle($query);

        return response()->json($result, 200);
    }
}
