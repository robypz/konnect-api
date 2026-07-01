<?php

namespace Src\Collaboration\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Src\Collaboration\Application\Commands\DeleteCommentCommand;
use Src\Collaboration\Application\Handlers\DeleteCommentCommandHandler;

class DeleteCommentController
{
    public function __invoke(string $commentId, DeleteCommentCommandHandler $handler): JsonResponse
    {
        $command = new DeleteCommentCommand(commentId: $commentId);
        $result = $handler->handle($command);

        return response()->json($result, 200);
    }
}
