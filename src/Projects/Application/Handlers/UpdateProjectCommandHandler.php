<?php

namespace Src\Projects\Application\Handlers;

use App\Models\Project;
use Src\Projects\Application\Commands\UpdateProjectCommand;

class UpdateProjectCommandHandler
{
    public function handle(UpdateProjectCommand $command): array
    {
        $project = Project::find($command->projectId);

        if (!$project) {
            throw new \Exception('Project not found');
        }

        $updateData = [];
        if ($command->name !== null) {
            $updateData['name'] = $command->name;
        }
        if ($command->description !== null) {
            $updateData['description'] = $command->description;
        }
        if ($command->startDate !== null) {
            $updateData['start_date'] = $command->startDate;
        }
        if ($command->endDate !== null) {
            $updateData['end_date'] = $command->endDate;
        }
        if ($command->status !== null) {
            $updateData['status'] = $command->status;
        }

        $project->update($updateData);

        return [
            'id' => $project->id,
            'name' => $project->name,
            'description' => $project->description,
            'start_date' => $project->start_date,
            'end_date' => $project->end_date,
            'status' => $project->status,
            'updated_at' => $project->updated_at,
        ];
    }
}
