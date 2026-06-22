<?php

namespace Src\HR\Domain\Entities;

use Src\HR\Domain\ValueObjects\DepartmentId;
use Src\HR\Domain\ValueObjects\DepartmentName;

class Department
{
    private DepartmentId $id;
    private DepartmentName $name;

    public function __construct(DepartmentId $id, DepartmentName $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): DepartmentId
    {
        return $this->id;
    }

    public function getName(): DepartmentName
    {
        return $this->name;
    }
}
