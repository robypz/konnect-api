<?php

namespace Src\Identity\Domain\ValueObjects;

class Password
{
    private string $hashedPassword;

    public function __construct(string $hashedPassword)
    {
        $this->hashedPassword = $hashedPassword;
    }

    public function value(): string
    {
        return $this->hashedPassword;
    }
}
