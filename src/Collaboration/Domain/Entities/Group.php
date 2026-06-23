<?php
namespace Src\Collaboration\Domain\Entities;
use Src\Collaboration\Domain\ValueObjects\GroupId;

class Group {
    private GroupId $id;
    private string $name;

    public function __construct(GroupId $id, string $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): GroupId { return $this->id; }
    public function getName(): string { return $this->name; }
}
