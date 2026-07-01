<?php

namespace Src\HR\Application\Handlers;

use App\Models\Employee;
use Src\HR\Application\Queries\GetEmployeePostsQuery;

class GetEmployeePostsQueryHandler
{
    public function handle(GetEmployeePostsQuery $query): array
    {
        $employee = Employee::find($query->employeeId);

        if (!$employee) {
            return [];
        }

        return $employee->posts()->with('comments', 'reactions')->get()->toArray();
    }
}
