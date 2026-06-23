<?php
namespace Src\Events\Domain\ValueObjects;
use InvalidArgumentException;
class EventTitle {
    private string $title;
    public function __construct(string $title) {
        if (empty(trim($title))) throw new InvalidArgumentException("Event title cannot be empty.");
        $this->title = $title;
    }
    public function value(): string { return $this->title; }
}
