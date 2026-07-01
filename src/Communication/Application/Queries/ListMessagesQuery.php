<?php

namespace Src\Communication\Application\Queries;

class ListMessagesQuery
{
    public function __construct(
        public string $chatId,
        public int $page = 1,
        public int $perPage = 50
    ) {
    }
}
