<?php

namespace Src\Projects\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Src\Projects\Application\Queries\GetProjectByIdQuery;
use Src\Projects\Application\Handlers\GetProjectByIdQueryHandler;

class GetProjectByIdController
{
    public function __invoke(string $projectId, GetProjectByIdQueryHandler $handler): JsonResponse
    {
        $query = new GetProjectByIdQuery(projectId: $projectId);
        $result = $handler->handle($query);

        return response()->json($result, 200);
    }
}
