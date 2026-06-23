<?php
namespace Src\Collaboration\Domain\ValueObjects;
use InvalidArgumentException;
class ReactionType {
    private string $type;
    private const ALLOWED_TYPES = ['like', 'love', 'haha', 'wow', 'sad', 'angry'];

    public function __construct(string $type) {
        $type = strtolower($type);
        if (!in_array($type, self::ALLOWED_TYPES)) {
            throw new InvalidArgumentException("Invalid reaction type.");
        }
        $this->type = $type;
    }
    public function value(): string { return $this->type; }
}
