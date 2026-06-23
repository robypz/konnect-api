<?php
namespace Src\HR\Application\Commands;

use Src\HR\Domain\Entities\Department;
use Src\HR\Domain\Repositories\DepartmentRepositoryInterface;
use Src\HR\Domain\ValueObjects\DepartmentId;
use Src\HR\Domain\ValueObjects\DepartmentName;
use Illuminate\Support\Str;

class CreateDepartmentCommandHandler {
    private DepartmentRepositoryInterface $repository;

    public function __construct(DepartmentRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function handle(CreateDepartmentCommand $command): void {
        $id = new DepartmentId((string) Str::uuid());
        $name = new DepartmentName($command->name);

        $department = new Department($id, $name);
        $this->repository->save($department);
    }
}
