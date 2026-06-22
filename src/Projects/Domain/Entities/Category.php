<?php
namespace Src\Projects\Domain\Entities;
use Src\Projects\Domain\ValueObjects\CategoryId;
use Src\Projects\Domain\ValueObjects\CategoryName;

class Category {
    private CategoryId $id;
    private CategoryName $name;

    public function __construct(CategoryId $id, CategoryName $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): CategoryId { return $this->id; }
    public function getName(): CategoryName { return $this->name; }
}
