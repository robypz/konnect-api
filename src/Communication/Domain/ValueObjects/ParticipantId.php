<?php
namespace Src\Communication\Domain\ValueObjects;
use InvalidArgumentException;
class ParticipantId {
    private string $id;
    public function __construct(string $id) {
        if (empty($id)) throw new InvalidArgumentException("Participant ID cannot be empty.");
        $this->id = $id;
    }
    public function value(): string { return $this->id; }
}
