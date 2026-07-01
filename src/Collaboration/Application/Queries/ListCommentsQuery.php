<?php

namespace Src\Collaboration\Application\Queries;

class ListCommentsQuery
{
    public function __construct(
        public string $postId,
        public int $page = 1,
        public int $perPage = 15
    ) {
    }
}
