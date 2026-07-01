<?php

namespace Src\HR\Application\Handlers;

use App\Models\Department;
use Src\HR\Application\Commands\CreateDepartmentCommand;

class CreateDepartmentCommandHandler
{
    public function handle(CreateDepartmentCommand $command): Department
    {
        $department = new Department();
        $department->name = $command->name;
        $department->description = $command->description;
        $department->save();

        return $department;
    }
}
