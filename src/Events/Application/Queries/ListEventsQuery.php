<?php

namespace Src\Events\Application\Queries;

class ListEventsQuery
{
    public function __construct(
        public int $page = 1,
        public int $perPage = 15
    ) {
    }
}
