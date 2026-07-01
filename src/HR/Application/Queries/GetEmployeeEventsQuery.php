<?php

namespace Src\HR\Application\Queries;

class GetEmployeeEventsQuery
{
    public function __construct(public string $employeeId)
    {
    }
}
