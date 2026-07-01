<?php

namespace Src\Projects\Application\Handlers;

use App\Models\Project;
use Src\Projects\Application\Commands\CreateProjectCommand;

class CreateProjectCommandHandler
{
    public function handle(CreateProjectCommand $command): array
    {
        $project = Project::create([
            'name' => $command->name,
            'description' => $command->description,
            'start_date' => $command->startDate,
            'end_date' => $command->endDate,
            'status' => $command->status,
        ]);

        return [
            'id' => $project->id,
            'name' => $project->name,
            'description' => $project->description,
            'start_date' => $project->start_date,
            'end_date' => $project->end_date,
            'status' => $project->status,
            'created_at' => $project->created_at,
        ];
    }
}
