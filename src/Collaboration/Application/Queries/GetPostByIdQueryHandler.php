<?php
namespace Src\Collaboration\Application\Queries;

use Src\Collaboration\Domain\Repositories\PostRepositoryInterface;
use Src\Collaboration\Domain\ValueObjects\PostId;

class GetPostByIdQueryHandler {
    private PostRepositoryInterface $repository;

    public function __construct(PostRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function handle(GetPostByIdQuery $query) {
        return $this->repository->findById(new PostId($query->id));
    }
}
