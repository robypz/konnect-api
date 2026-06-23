<?php
namespace Src\Communication\Domain\ValueObjects;
use InvalidArgumentException;
class MessageContent {
    private string $content;
    public function __construct(string $content) {
        if (empty(trim($content))) throw new InvalidArgumentException("Message content cannot be empty.");
        $this->content = $content;
    }
    public function value(): string { return $this->content; }
}
