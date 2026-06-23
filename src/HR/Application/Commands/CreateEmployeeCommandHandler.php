<?php
namespace Src\HR\Application\Commands;

use Src\HR\Domain\Entities\Employee;
use Src\HR\Domain\Repositories\EmployeeRepositoryInterface;
use Src\HR\Domain\ValueObjects\EmployeeId;
use Src\HR\Domain\ValueObjects\DepartmentId;
use Src\Identity\Domain\ValueObjects\UserId;
use Illuminate\Support\Str;

class CreateEmployeeCommandHandler {
    private EmployeeRepositoryInterface $repository;

    public function __construct(EmployeeRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function handle(CreateEmployeeCommand $command): void {
        $id = new EmployeeId((string) Str::uuid());
        $userId = new UserId($command->userId);
        $departmentId = new DepartmentId($command->departmentId);

        $employee = new Employee($id, $userId, $departmentId);
        $this->repository->save($employee);
    }
}
