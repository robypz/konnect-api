<?php

namespace Src\HR\Domain\ValueObjects;

use InvalidArgumentException;

class EmployeeId
{
    private string $id;

    public function __construct(string $id)
    {
        if (empty($id)) {
            throw new InvalidArgumentException("Employee ID cannot be empty.");
        }
        $this->id = $id;
    }

    public function value(): string
    {
        return $this->id;
    }
}
