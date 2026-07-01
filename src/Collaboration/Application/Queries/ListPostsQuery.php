<?php

namespace Src\Collaboration\Application\Queries;

class ListPostsQuery
{
    public function __construct(
        public int $page = 1,
        public int $perPage = 15
    ) {
    }
}
