<?php
namespace Src\Projects\Domain\Entities;
use Src\Projects\Domain\ValueObjects\TagId;
use Src\Projects\Domain\ValueObjects\TagName;

class Tag {
    private TagId $id;
    private TagName $name;

    public function __construct(TagId $id, TagName $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): TagId { return $this->id; }
    public function getName(): TagName { return $this->name; }
}
