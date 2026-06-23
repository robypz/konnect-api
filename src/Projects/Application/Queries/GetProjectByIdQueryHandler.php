<?php
namespace Src\Projects\Application\Queries;

use Src\Projects\Domain\Repositories\ProjectRepositoryInterface;
use Src\Projects\Domain\ValueObjects\ProjectId;

class GetProjectByIdQueryHandler {
    private ProjectRepositoryInterface $repository;

    public function __construct(ProjectRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function handle(GetProjectByIdQuery $query) {
        return $this->repository->findById(new ProjectId($query->id));
    }
}
