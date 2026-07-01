<?php

namespace Src\Projects\Application\Handlers;

use App\Models\Project;
use Src\Projects\Application\Queries\ListProjectsByEmployeeQuery;

class ListProjectsByEmployeeQueryHandler
{
    public function handle(ListProjectsByEmployeeQuery $query): array
    {
        $projects = Project::whereHas('employees', function ($q) {
            $q->where('employee_id', $query->employeeId);
        })->paginate($query->perPage, ['*'], 'page', $query->page);

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
