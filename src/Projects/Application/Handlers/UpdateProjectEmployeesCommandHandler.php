<?php

namespace Src\Projects\Application\Handlers;

use App\Models\Project;
use Src\Projects\Application\Commands\UpdateProjectEmployeesCommand;

class UpdateProjectEmployeesCommandHandler
{
    public function handle(UpdateProjectEmployeesCommand $command): array
    {
        $project = Project::find($command->projectId);

        if (!$project) {
            throw new \Exception('Project not found');
        }

        $project->employees()->sync($command->employeeIds);

        return [
            'message' => 'Project employees updated successfully',
            'project_id' => $command->projectId,
            'employee_ids' => $command->employeeIds,
        ];
    }
}
