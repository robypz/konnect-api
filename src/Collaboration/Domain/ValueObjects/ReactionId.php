<?php
namespace Src\Collaboration\Domain\ValueObjects;
use InvalidArgumentException;
class ReactionId {
    private string $id;
    public function __construct(string $id) {
        if (empty($id)) throw new InvalidArgumentException("Reaction ID cannot be empty.");
        $this->id = $id;
    }
    public function value(): string { return $this->id; }
}
