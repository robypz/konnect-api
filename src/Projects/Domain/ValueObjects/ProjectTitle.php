<?php
namespace Src\Projects\Domain\ValueObjects;
use InvalidArgumentException;
class ProjectTitle {
    private string $title;
    public function __construct(string $title) {
        if (empty(trim($title))) throw new InvalidArgumentException("Project title cannot be empty.");
        $this->title = $title;
    }
    public function value(): string { return $this->title; }
}
