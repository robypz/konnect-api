<?php

namespace Src\HR\Domain\ValueObjects;

use InvalidArgumentException;

class DepartmentId
{
    private string $id;

    public function __construct(string $id)
    {
        if (empty($id)) {
            throw new InvalidArgumentException("Department ID cannot be empty.");
        }
        $this->id = $id;
    }

    public function value(): string
    {
        return $this->id;
    }
}
