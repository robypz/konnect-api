<?php

namespace Src\Events\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Src\Events\Application\Commands\DeleteEventCommand;
use Src\Events\Application\Handlers\DeleteEventCommandHandler;

class DeleteEventController
{
    public function __invoke(string $eventId, DeleteEventCommandHandler $handler): JsonResponse
    {
        $command = new DeleteEventCommand(eventId: $eventId);
        $result = $handler->handle($command);

        return response()->json($result, 200);
    }
}
