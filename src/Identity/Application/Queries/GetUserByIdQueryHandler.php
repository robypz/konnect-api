<?php
namespace Src\Identity\Application\Queries;

use Src\Identity\Domain\Repositories\UserRepositoryInterface;
use Src\Identity\Domain\ValueObjects\UserId;

class GetUserByIdQueryHandler {
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function handle(GetUserByIdQuery $query) {
        return $this->repository->findById(new UserId($query->id));
    }
}
