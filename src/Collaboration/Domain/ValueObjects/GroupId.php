<?php
namespace Src\Collaboration\Domain\ValueObjects;
use InvalidArgumentException;
class GroupId {
    private string $id;
    public function __construct(string $id) {
        if (empty($id)) throw new InvalidArgumentException("Group ID cannot be empty.");
        $this->id = $id;
    }
    public function value(): string { return $this->id; }
}
