<?php
namespace Src\HR\Infrastructure\Mappers;

use App\Models\Department as EloquentDepartment;
use Src\HR\Domain\Entities\Department as DomainDepartment;
use Src\HR\Domain\ValueObjects\DepartmentId;
use Src\HR\Domain\ValueObjects\DepartmentName;

class DepartmentDataMapper {
    public static function toDomain(EloquentDepartment $eloquentDepartment): DomainDepartment {
        return new DomainDepartment(
            new DepartmentId((string) $eloquentDepartment->_id),
            new DepartmentName($eloquentDepartment->name)
        );
    }
}
