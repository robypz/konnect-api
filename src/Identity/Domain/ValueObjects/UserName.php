<?php

namespace Src\Identity\Domain\ValueObjects;

use InvalidArgumentException;

class UserName
{
    private string $name;

    public function __construct(string $name)
    {
        if (empty(trim($name))) {
            throw new InvalidArgumentException("Username cannot be empty.");
        }
        $this->name = $name;
    }

    public function value(): string
    {
        return $this->name;
    }
}
