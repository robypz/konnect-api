<?php
namespace Src\Projects\Domain\ValueObjects;
use InvalidArgumentException;
class ProjectId {
    private string $id;
    public function __construct(string $id) {
        if (empty($id)) throw new InvalidArgumentException("Project ID cannot be empty.");
        $this->id = $id;
    }
    public function value(): string { return $this->id; }
}
