<?php

namespace Src\Communication\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Src\Communication\Application\Queries\GetChatByIdQuery;
use Src\Communication\Application\Handlers\GetChatByIdQueryHandler;

class GetChatByIdController
{
    public function __invoke(string $chatId, GetChatByIdQueryHandler $handler): JsonResponse
    {
        $query = new GetChatByIdQuery(chatId: $chatId);
        $result = $handler->handle($query);

        return response()->json($result, 200);
    }
}
