<?php
namespace Src\Projects\Domain\Entities;
use Src\Projects\Domain\ValueObjects\StatusId;

class Status {
    private StatusId $id;
    private string $name;

    public function __construct(StatusId $id, string $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): StatusId { return $this->id; }
    public function getName(): string { return $this->name; }
}
