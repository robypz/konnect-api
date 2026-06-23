<?php
namespace Src\HR\Application\Queries;

use Src\HR\Domain\Repositories\EmployeeRepositoryInterface;
use Src\HR\Domain\ValueObjects\EmployeeId;

class GetEmployeeByIdQueryHandler {
    private EmployeeRepositoryInterface $repository;

    public function __construct(EmployeeRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function handle(GetEmployeeByIdQuery $query) {
        return $this->repository->findById(new EmployeeId($query->id));
    }
}
