<?php
namespace Src\Projects\Domain\ValueObjects;
use InvalidArgumentException;
class TagId {
    private string $id;
    public function __construct(string $id) {
        if (empty($id)) throw new InvalidArgumentException("Tag ID cannot be empty.");
        $this->id = $id;
    }
    public function value(): string { return $this->id; }
}
