<?php

namespace Src\HR\Application\Handlers;

use App\Models\Department;
use Src\HR\Application\Queries\ListDepartmentsQuery;

class ListDepartmentsQueryHandler
{
    public function handle(ListDepartmentsQuery $query): array
    {
        $departments = Department::paginate($query->perPage, ['*'], 'page', $query->page);

        return $departments->toArray();
    }
}
