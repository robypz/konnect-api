<?php
namespace Src\Identity\Application\Commands;

use Src\Identity\Domain\Entities\User;
use Src\Identity\Domain\Repositories\UserRepositoryInterface;
use Src\Identity\Domain\ValueObjects\UserId;
use Src\Identity\Domain\ValueObjects\UserName;
use Src\Identity\Domain\ValueObjects\Email;
use Src\Identity\Domain\ValueObjects\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CreateUserCommandHandler {
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function handle(CreateUserCommand $command): void {
        $id = new UserId((string) Str::uuid()); 
        $name = new UserName($command->name);
        $email = new Email($command->email);
        $password = new Password(Hash::make($command->password));

        $user = new User($id, $name, $email, $password);
        $this->repository->save($user);
    }
}
