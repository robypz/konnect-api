<?php

namespace Src\Communication\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Src\Communication\Application\Commands\DeleteMessageCommand;
use Src\Communication\Application\Handlers\DeleteMessageCommandHandler;

class DeleteMessageController
{
    public function __invoke(string $messageId, DeleteMessageCommandHandler $handler): JsonResponse
    {
        $command = new DeleteMessageCommand(messageId: $messageId);
        $result = $handler->handle($command);

        return response()->json($result, 200);
    }
}
