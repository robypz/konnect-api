<?php
namespace Src\Projects\Domain\ValueObjects;
class ProjectDescription {
    private string $description;
    public function __construct(string $description) {
        $this->description = $description;
    }
    public function value(): string { return $this->description; }
}
