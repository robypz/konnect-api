<?php

namespace Src\Identity\Application\Commands;

class SignInCommand
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
        public readonly string $deviceName,
    ) {
    }
}
