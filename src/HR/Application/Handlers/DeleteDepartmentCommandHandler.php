<?php

namespace Src\HR\Application\Handlers;

use App\Models\Department;
use Src\HR\Application\Commands\DeleteDepartmentCommand;

class DeleteDepartmentCommandHandler
{
    public function handle(DeleteDepartmentCommand $command): void
    {
        $department = Department::find($command->departmentId);

        if (!$department) {
            throw new \Exception('Department not found');
        }

        $department->delete();
    }
}
