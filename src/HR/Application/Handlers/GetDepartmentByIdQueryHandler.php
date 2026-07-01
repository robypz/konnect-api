<?php

namespace Src\HR\Application\Handlers;

use App\Models\Department;
use Src\HR\Application\Queries\GetDepartmentByIdQuery;

class GetDepartmentByIdQueryHandler
{
    public function handle(GetDepartmentByIdQuery $query): ?Department
    {
        return Department::find($query->departmentId);
    }
}
