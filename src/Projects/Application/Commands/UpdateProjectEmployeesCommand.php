<?php

namespace Src\Projects\Application\Commands;

class UpdateProjectEmployeesCommand
{
    public function __construct(
        public string $projectId,
        public array $employeeIds
    ) {
    }
}
