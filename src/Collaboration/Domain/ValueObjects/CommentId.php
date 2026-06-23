<?php
namespace Src\Collaboration\Domain\ValueObjects;
use InvalidArgumentException;
class CommentId {
    private string $id;
    public function __construct(string $id) {
        if (empty($id)) throw new InvalidArgumentException("Comment ID cannot be empty.");
        $this->id = $id;
    }
    public function value(): string { return $this->id; }
}
