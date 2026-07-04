<?php

namespace Src\HR\Application\Handlers;

use App\Models\Employee;
use Src\HR\Application\Commands\CreateEmployeeCommand;

class CreateEmployeeCommandHandler
{
    public function handle(CreateEmployeeCommand $command): Employee
    {
        $employee = new Employee();
        $employee->name = $command->name;
        $employee->description = $command->description;
        $employee->save();

        return $employee;
    }
}
