<?php
namespace Src\Projects\Domain\ValueObjects;
class TaskContent {
    private string $content;
    public function __construct(string $content) {
        $this->content = $content;
    }
    public function value(): string { return $this->content; }
}
