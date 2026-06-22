<?php

namespace Src\HR\Domain\ValueObjects;

use InvalidArgumentException;

class DepartmentName
{
    private string $name;

    public function __construct(string $name)
    {
        if (empty(trim($name))) {
            throw new InvalidArgumentException("Department Name cannot be empty.");
        }
        $this->name = $name;
    }

    public function value(): string
    {
        return $this->name;
    }
}
