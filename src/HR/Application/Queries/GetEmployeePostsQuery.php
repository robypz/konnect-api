<?php

namespace Src\HR\Application\Queries;

class GetEmployeePostsQuery
{
    public function __construct(public string $employeeId)
    {
    }
}
