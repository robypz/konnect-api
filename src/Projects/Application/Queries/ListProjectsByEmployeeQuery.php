<?php

namespace Src\Projects\Application\Queries;

class ListProjectsByEmployeeQuery
{
    public function __construct(
        public string $employeeId,
        public int $page = 1,
        public int $perPage = 15
    ) {
    }
}
