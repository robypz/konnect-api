<?php
namespace Src\Projects\Domain\ValueObjects;
use InvalidArgumentException;
class CategoryName {
    private string $name;
    public function __construct(string $name) {
        if (empty(trim($name))) throw new InvalidArgumentException("Category name cannot be empty.");
        $this->name = $name;
    }
    public function value(): string { return $this->name; }
}
