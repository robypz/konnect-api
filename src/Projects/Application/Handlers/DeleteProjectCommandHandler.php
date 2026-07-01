<?php

namespace Src\Projects\Application\Handlers;

use App\Models\Project;
use Src\Projects\Application\Commands\DeleteProjectCommand;

class DeleteProjectCommandHandler
{
    public function handle(DeleteProjectCommand $command): array
    {
        $project = Project::find($command->projectId);

        if (!$project) {
            throw new \Exception('Project not found');
        }

        $project->delete();

        return [
            'message' => 'Project deleted successfully',
            'id' => $command->projectId,
        ];
    }
}
