<?php
namespace Src\HR\Domain\Repositories;

use Src\HR\Domain\Entities\Employee;
use Src\HR\Domain\ValueObjects\EmployeeId;

interface EmployeeRepositoryInterface {
    public function save(Employee $employee): void;
    public function findById(EmployeeId $id): ?Employee;
}
