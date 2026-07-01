<?php

namespace Src\HR\Application\Handlers;

use App\Models\Employee;
use Src\HR\Application\Queries\GetEmployeeTasksQuery;

class GetEmployeeTasksQueryHandler
{
    public function handle(GetEmployeeTasksQuery $query): array
    {
        $employee = Employee::find($query->employeeId);

        if (!$employee) {
            return [];
        }

        return $employee->tasks()->with('status', 'employee')->get()->toArray();
    }
}
