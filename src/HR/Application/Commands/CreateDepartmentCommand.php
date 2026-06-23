<?php
namespace Src\HR\Application\Commands;

class CreateDepartmentCommand {
    public string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }
}
