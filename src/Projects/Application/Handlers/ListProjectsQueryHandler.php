<?php

namespace Src\Projects\Application\Handlers;

use App\Models\Project;
use Src\Projects\Application\Queries\ListProjectsQuery;

class ListProjectsQueryHandler
{
    public function handle(ListProjectsQuery $query): array
    {
        $projects = Project::paginate($query->perPage, ['*'], 'page', $query->page);

        return [
            'data' => $projects->items(),
            'pagination' => [
                'total' => $projects->total(),
                'per_page' => $projects->perPage(),
                'current_page' => $projects->currentPage(),
                'last_page' => $projects->lastPage(),
            ],
        ];
    }
}
