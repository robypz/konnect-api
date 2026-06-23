<?php
namespace Src\HR\Application\Commands;

class CreateEmployeeCommand {
    public string $userId;
    public string $departmentId;

    public function __construct(string $userId, string $departmentId) {
        $this->userId = $userId;
        $this->departmentId = $departmentId;
    }
}
