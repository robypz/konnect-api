<?php
namespace Src\HR\Infrastructure\Mappers;

use App\Models\Employee as EloquentEmployee;
use Src\HR\Domain\Entities\Employee as DomainEmployee;
use Src\HR\Domain\ValueObjects\EmployeeId;
use Src\HR\Domain\ValueObjects\DepartmentId;
use Src\Identity\Domain\ValueObjects\UserId;

class EmployeeDataMapper {
    public static function toDomain(EloquentEmployee $eloquentEmployee): DomainEmployee {
        return new DomainEmployee(
            new EmployeeId((string) $eloquentEmployee->_id),
            new UserId((string) $eloquentEmployee->user_id),
            new DepartmentId((string) $eloquentEmployee->department_id)
        );
    }
}
