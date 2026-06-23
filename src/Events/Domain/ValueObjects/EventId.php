<?php
namespace Src\Events\Domain\ValueObjects;
use InvalidArgumentException;
class EventId {
    private string $id;
    public function __construct(string $id) {
        if (empty($id)) throw new InvalidArgumentException("Event ID cannot be empty.");
        $this->id = $id;
    }
    public function value(): string { return $this->id; }
}
