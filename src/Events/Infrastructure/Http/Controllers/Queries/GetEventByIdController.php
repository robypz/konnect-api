<?php

namespace Src\Events\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Src\Events\Application\Queries\GetEventByIdQuery;
use Src\Events\Application\Handlers\GetEventByIdQueryHandler;

class GetEventByIdController
{
    public function __invoke(string $eventId, GetEventByIdQueryHandler $handler): JsonResponse
    {
        $query = new GetEventByIdQuery(eventId: $eventId);
        $result = $handler->handle($query);

        return response()->json($result, 200);
    }
}
