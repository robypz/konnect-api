<?php

namespace Src\HR\Application\Queries;

class GetEmployeeProjectsQuery
{
    public function __construct(public string $employeeId)
    {
    }
}
