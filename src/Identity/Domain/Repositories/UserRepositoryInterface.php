<?php
namespace Src\Identity\Domain\Repositories;

use Src\Identity\Domain\Entities\User;
use Src\Identity\Domain\ValueObjects\UserId;

interface UserRepositoryInterface {
    public function save(User $user): void;
    public function findById(UserId $id): ?User;
    public function findByEmail(string $email): ?User;
}
