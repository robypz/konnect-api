<?php

namespace Src\HR\Application\Handlers;

use App\Models\Employee;
use Src\HR\Application\Queries\GetEmployeeEventsQuery;

class GetEmployeeEventsQueryHandler
{
    public function handle(GetEmployeeEventsQuery $query): array
    {
        $employee = Employee::find($query->employeeId);

        if (!$employee) {
            return [];
        }

        return $employee->events()->get()->toArray();
    }
}
