<?php

namespace Src\HR\Application\Commands;

class DeleteDepartmentCommand
{
    public function __construct(public string $departmentId)
    {
    }
}
