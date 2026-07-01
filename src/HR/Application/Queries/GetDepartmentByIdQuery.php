<?php

namespace Src\HR\Application\Queries;

class GetDepartmentByIdQuery
{
    public function __construct(public string $departmentId)
    {
    }
}
