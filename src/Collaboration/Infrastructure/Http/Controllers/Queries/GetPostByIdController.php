<?php

namespace Src\Collaboration\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Src\Collaboration\Application\Queries\GetPostByIdQuery;
use Src\Collaboration\Application\Handlers\GetPostByIdQueryHandler;

class GetPostByIdController
{
    public function __invoke(string $postId, GetPostByIdQueryHandler $handler): JsonResponse
    {
        $query = new GetPostByIdQuery(postId: $postId);
        $result = $handler->handle($query);

        return response()->json($result, 200);
    }
}
