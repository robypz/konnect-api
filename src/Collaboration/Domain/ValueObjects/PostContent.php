<?php
namespace Src\Collaboration\Domain\ValueObjects;
use InvalidArgumentException;
class PostContent {
    private string $content;
    public function __construct(string $content) {
        if (empty(trim($content))) throw new InvalidArgumentException("Post content cannot be empty.");
        $this->content = $content;
    }
    public function value(): string { return $this->content; }
}
