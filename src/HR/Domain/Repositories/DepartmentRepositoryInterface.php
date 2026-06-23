<?php
namespace Src\HR\Domain\Repositories;

use Src\HR\Domain\Entities\Department;
use Src\HR\Domain\ValueObjects\DepartmentId;

interface DepartmentRepositoryInterface {
    public function save(Department $department): void;
    public function findById(DepartmentId $id): ?Department;
}
