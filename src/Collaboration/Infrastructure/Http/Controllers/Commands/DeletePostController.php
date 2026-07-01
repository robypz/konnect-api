<?php

namespace Src\Collaboration\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Src\Collaboration\Application\Commands\DeletePostCommand;
use Src\Collaboration\Application\Handlers\DeletePostCommandHandler;

class DeletePostController
{
    public function __invoke(string $postId, DeletePostCommandHandler $handler): JsonResponse
    {
        $command = new DeletePostCommand(postId: $postId);
        $result = $handler->handle($command);

        return response()->json($result, 200);
    }
}
