<?php

namespace Src\Identity\Application\Handlers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Src\Identity\Application\Commands\SignUpCommand;
use Src\Identity\Domain\Entities\User as DomainUser;
use Src\Identity\Domain\Repositories\UserRepositoryInterface;
use Src\Identity\Domain\ValueObjects\Email;
use Src\Identity\Domain\ValueObjects\Password;
use Src\Identity\Domain\ValueObjects\UserId;
use Src\Identity\Domain\ValueObjects\UserName;

class SignUpCommandHandler
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
    ) {
    }

    public function handle(SignUpCommand $command): string
    {
        if ($this->userRepository->findByEmail($command->email)) {
            throw ValidationException::withMessages([
                'email' => ['The provided email is already registered.'],
            ]);
        }

        $password = new Password(Hash::make($command->password));
        $user = new DomainUser(
            new UserId(uniqid('', true)),
            new UserName($command->name),
            new Email($command->email),
            $password,
        );

        $this->userRepository->save($user);

        $eloquentUser = \App\Models\User::where('email', $command->email)->first();

        if (! $eloquentUser) {
            throw ValidationException::withMessages([
                'user' => ['Unable to create user.'],
            ]);
        }

        return $eloquentUser->createToken($command->deviceName)->plainTextToken;
    }
}
