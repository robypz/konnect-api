<?php

namespace Src\Identity\Application\Handlers;

use Illuminate\Support\Facades\Password;
use Src\Identity\Application\Commands\SendPasswordResetLinkCommand;

class SendPasswordResetLinkCommandHandler
{
    public function handle(SendPasswordResetLinkCommand $command): string
    {
        return Password::sendResetLink(['email' => $command->email]);
    }
}
