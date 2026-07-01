<?php

namespace Src\HR\Application\Queries;

class GetEmployeeTasksQuery
{
    public function __construct(public string $employeeId)
    {
    }
}
