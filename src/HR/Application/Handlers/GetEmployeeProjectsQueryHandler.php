<?php

namespace Src\HR\Application\Handlers;

use App\Models\Employee;
use Src\HR\Application\Queries\GetEmployeeProjectsQuery;

class GetEmployeeProjectsQueryHandler
{
    public function handle(GetEmployeeProjectsQuery $query): array
    {
        $employee = Employee::find($query->employeeId);

        if (!$employee) {
            return [];
        }

        return $employee->projects()->with('status', 'category')->get()->toArray();
    }
}
