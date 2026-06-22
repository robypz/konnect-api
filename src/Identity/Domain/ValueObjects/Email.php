<?php

namespace Src\Identity\Domain\ValueObjects;

use InvalidArgumentException;

class Email
{
    private string $email;

    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Invalid email format.");
        }
        $this->email = $email;
    }

    public function value(): string
    {
        return $this->email;
    }
}
