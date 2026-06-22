<?php
namespace Src\Projects\Domain\ValueObjects;
use InvalidArgumentException;
class CategoryId {
    private string $id;
    public function __construct(string $id) {
        if (empty($id)) throw new InvalidArgumentException("Category ID cannot be empty.");
        $this->id = $id;
    }
    public function value(): string { return $this->id; }
}
