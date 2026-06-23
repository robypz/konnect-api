<?php
namespace Src\HR\Infrastructure\Repositories;

use App\Models\Department as EloquentDepartment;
use Src\HR\Domain\Entities\Department as DomainDepartment;
use Src\HR\Domain\Repositories\DepartmentRepositoryInterface;
use Src\HR\Domain\ValueObjects\DepartmentId;
use Src\HR\Infrastructure\Mappers\DepartmentDataMapper;

class EloquentDepartmentRepository implements DepartmentRepositoryInterface {
    public function save(DomainDepartment $department): void {
        $eloquentDepartment = EloquentDepartment::find($department->getId()->value());
        
        if (!$eloquentDepartment) {
            $eloquentDepartment = new EloquentDepartment();
            $eloquentDepartment->_id = $department->getId()->value(); 
        }

        $eloquentDepartment->name = $department->getName()->value();
        $eloquentDepartment->save();
    }

    public function findById(DepartmentId $id): ?DomainDepartment {
        $eloquentDepartment = EloquentDepartment::find($id->value());
        if (!$eloquentDepartment) {
            return null;
        }
        return DepartmentDataMapper::toDomain($eloquentDepartment);
    }
}
