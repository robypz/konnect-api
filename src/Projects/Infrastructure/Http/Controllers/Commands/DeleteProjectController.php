<?php

namespace Src\Projects\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Src\Projects\Application\Commands\DeleteProjectCommand;
use Src\Projects\Application\Handlers\DeleteProjectCommandHandler;

class DeleteProjectController
{
    public function __invoke(string $projectId, DeleteProjectCommandHandler $handler): JsonResponse
    {
        $command = new DeleteProjectCommand(projectId: $projectId);
        $result = $handler->handle($command);

        return response()->json($result, 200);
    }
}
