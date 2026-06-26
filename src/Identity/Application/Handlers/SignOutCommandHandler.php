<?php

namespace Src\Identity\Application\Handlers;

use Illuminate\Support\Facades\Auth;
use Src\Identity\Application\Commands\SignOutCommand;

class SignOutCommandHandler
{
    public function handle(SignOutCommand $command): void
    {
        $user = Auth::user();

        if ($user && $user->id === $command->userId) {
            $user->tokens()->where('id', $command->tokenId)->delete();
            Auth::logout();
        }
    }
}
