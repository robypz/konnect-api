<?php
namespace Src\Events\Domain\ValueObjects;
class EventDescription {
    private string $description;
    public function __construct(string $description) {
        $this->description = $description;
    }
    public function value(): string { return $this->description; }
}
