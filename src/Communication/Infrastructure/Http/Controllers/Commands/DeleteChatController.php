<?php

namespace Src\Communication\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Src\Communication\Application\Commands\DeleteChatCommand;
use Src\Communication\Application\Handlers\DeleteChatCommandHandler;

class DeleteChatController
{
    public function __invoke(string $chatId, DeleteChatCommandHandler $handler): JsonResponse
    {
        $command = new DeleteChatCommand(chatId: $chatId);
        $result = $handler->handle($command);

        return response()->json($result, 200);
    }
}
