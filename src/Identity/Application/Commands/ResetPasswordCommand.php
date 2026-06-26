<?php

namespace Src\Identity\Application\Commands;

class ResetPasswordCommand
{
    public function __construct(
        public readonly string $token,
        public readonly string $email,
        public readonly string $password,
        public readonly string $passwordConfirmation,
    ) {
    }
}
