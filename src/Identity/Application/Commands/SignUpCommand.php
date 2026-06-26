<?php

namespace Src\Identity\Application\Commands;

class SignUpCommand
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly string $deviceName,
    ) {
    }
}
