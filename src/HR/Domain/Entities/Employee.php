<?php

namespace Src\HR\Domain\Entities;

use Src\HR\Domain\ValueObjects\EmployeeId;
use Src\HR\Domain\ValueObjects\DepartmentId;
use Src\Identity\Domain\ValueObjects\UserId;

class Employee
{
    private EmployeeId $id;
    private UserId $userId;
    private DepartmentId $departmentId;

    public function __construct(EmployeeId $id, UserId $userId, DepartmentId $departmentId)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->departmentId = $departmentId;
    }

    public function getId(): EmployeeId
    {
        return $this->id;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function getDepartmentId(): DepartmentId
    {
        return $this->departmentId;
    }
}
