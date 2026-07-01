<?php

namespace Src\Communication\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Communication\Application\Queries\ListMessagesQuery;
use Src\Communication\Application\Handlers\ListMessagesQueryHandler;

class ListMessagesController
{
    public function __invoke(Request $request, string $chatId, ListMessagesQueryHandler $handler): JsonResponse
    {
        $query = new ListMessagesQuery(
            chatId: $chatId,
            page: $request->query('page', 1),
            perPage: $request->query('per_page', 50)
        );

        $result = $handler->handle($query);

        return response()->json($result, 200);
    }
}
