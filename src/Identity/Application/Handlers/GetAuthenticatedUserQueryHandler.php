<?php

namespace Src\Identity\Application\Handlers;

use Src\Identity\Application\Queries\GetAuthenticatedUserQuery;
use Src\Identity\Domain\Repositories\UserRepositoryInterface;
use Src\Identity\Domain\ValueObjects\UserId;

class GetAuthenticatedUserQueryHandler
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
    ) {
    }

    public function handle(GetAuthenticatedUserQuery $query): ?object
    {
        $user = $this->userRepository->findById(new UserId($query->userId));

        if (! $user) {
            return null;
        }

        return (object) [
            'id' => $user->getId()->value(),
            'name' => $user->getName()->value(),
            'email' => $user->getEmail()->value(),
        ];
    }
}
