<?php

namespace Src\HR\Application\Handlers;

use App\Models\Department;
use Src\HR\Application\Commands\UpdateDepartmentCommand;

class UpdateDepartmentCommandHandler
{
    public function handle(UpdateDepartmentCommand $command): void
    {
        $department = Department::find($command->departmentId);

        if (!$department) {
            throw new \Exception('Department not found');
        }

        if ($command->name) {
            $department->name = $command->name;
        }
        if ($command->description !== null) {
            $department->description = $command->description;
        }

        $department->save();
    }
}
