<?php

namespace Src\Projects\Application\Handlers;

use App\Models\Project;
use Src\Projects\Application\Queries\GetProjectByIdQuery;

class GetProjectByIdQueryHandler
{
    public function handle(GetProjectByIdQuery $query): array
    {
        $project = Project::find($query->projectId);

        if (!$project) {
            throw new \Exception('Project not found');
        }

        return [
            'id' => $project->id,
            'name' => $project->name,
            'description' => $project->description,
            'start_date' => $project->start_date,
            'end_date' => $project->end_date,
            'status' => $project->status,
            'created_at' => $project->created_at,
            'updated_at' => $project->updated_at,
        ];
    }
}
