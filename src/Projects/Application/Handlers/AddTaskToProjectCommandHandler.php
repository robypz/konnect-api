<?php

namespace Src\Projects\Application\Handlers;

use App\Models\Project;
use Src\Projects\Application\Commands\AddTaskToProjectCommand;

class AddTaskToProjectCommandHandler
{
    public function handle(AddTaskToProjectCommand $command): array
    {
        $project = Project::find($command->projectId);

        if (!$project) {
            throw new \Exception('Project not found');
        }

        $project->tasks()->attach($command->taskId);

        return [
            'message' => 'Task added to project successfully',
            'project_id' => $command->projectId,
            'task_id' => $command->taskId,
        ];
    }
}
