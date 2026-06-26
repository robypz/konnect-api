<?php

namespace Src\Identity\Application\Handlers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Src\Identity\Application\Commands\ResetPasswordCommand;
use App\Models\User;

class ResetPasswordCommandHandler
{
    public function handle(ResetPasswordCommand $command): string
    {
        $status = Password::reset(
            [
                'token' => $command->token,
                'email' => $command->email,
                'password' => $command->password,
                'password_confirmation' => $command->passwordConfirmation,
            ],
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        return $status;
    }
}
