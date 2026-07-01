<?php

namespace Src\Events\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Events\Application\Queries\ListEventsQuery;
use Src\Events\Application\Handlers\ListEventsQueryHandler;

class ListEventsController
{
    public function __invoke(Request $request, ListEventsQueryHandler $handler): JsonResponse
    {
        $query = new ListEventsQuery(
            page: $request->query('page', 1),
            perPage: $request->query('per_page', 15)
        );

        $result = $handler->handle($query);

        return response()->json($result, 200);
    }
}
