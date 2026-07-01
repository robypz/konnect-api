<?php

namespace Src\Projects\Application\Queries;

class ListProjectsQuery
{
    public function __construct(
        public int $page = 1,
        public int $perPage = 15
    ) {
    }
}
