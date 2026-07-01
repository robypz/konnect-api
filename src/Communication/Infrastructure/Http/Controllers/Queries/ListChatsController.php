<?php

namespace Src\Communication\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Communication\Application\Queries\ListChatsQuery;
use Src\Communication\Application\Handlers\ListChatsQueryHandler;

class ListChatsController
{
    public function __invoke(Request $request, ListChatsQueryHandler $handler): JsonResponse
    {
        $query = new ListChatsQuery(
            userId: auth()->id(),
            page: $request->query('page', 1),
            perPage: $request->query('per_page', 15)
        );

        $result = $handler->handle($query);

        return response()->json($result, 200);
    }
}
