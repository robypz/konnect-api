<?php
namespace Src\HR\Infrastructure\Repositories;

use App\Models\Employee as EloquentEmployee;
use Src\HR\Domain\Entities\Employee as DomainEmployee;
use Src\HR\Domain\Repositories\EmployeeRepositoryInterface;
use Src\HR\Domain\ValueObjects\EmployeeId;
use Src\HR\Infrastructure\Mappers\EmployeeDataMapper;

class EloquentEmployeeRepository implements EmployeeRepositoryInterface {
    public function save(DomainEmployee $employee): void {
        $eloquentEmployee = EloquentEmployee::find($employee->getId()->value());
        
        if (!$eloquentEmployee) {
            $eloquentEmployee = new EloquentEmployee();
            $eloquentEmployee->_id = $employee->getId()->value(); 
        }

        $eloquentEmployee->user_id = $employee->getUserId()->value();
        $eloquentEmployee->department_id = $employee->getDepartmentId()->value();
        
        $eloquentEmployee->save();
    }

    public function findById(EmployeeId $id): ?DomainEmployee {
        $eloquentEmployee = EloquentEmployee::find($id->value());
        if (!$eloquentEmployee) {
            return null;
        }
        return EmployeeDataMapper::toDomain($eloquentEmployee);
    }
}
