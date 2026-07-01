<?php

namespace Src\Communication\Application\Queries;

class ListChatsQuery
{
    public function __construct(
        public string $userId,
        public int $page = 1,
        public int $perPage = 15
    ) {
    }
}
