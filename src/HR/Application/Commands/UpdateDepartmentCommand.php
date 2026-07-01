<?php

namespace Src\HR\Application\Commands;

class UpdateDepartmentCommand
{
    public function __construct(
        public string $departmentId,
        public ?string $name = null,
        public ?string $description = null,
    ) {
    }
}
