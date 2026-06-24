<?php

namespace Src\Identity\Application\Handlers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Src\Identity\Application\Commands\SignInCommand;
use Src\Identity\Domain\Repositories\UserRepositoryInterface;

class SignInCommandHandler
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
    ) {
    }

    public function handle(SignInCommand $command): string
    {
        $user = $this->userRepository->findByEmail($command->email);

        if (! $user || ! Hash::check($command->password, $user->getPassword()->value())) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $eloquentUser = \App\Models\User::where('email', $command->email)->first();

        return $eloquentUser?->createToken($command->deviceName)->plainTextToken ?? '';
    }
}
