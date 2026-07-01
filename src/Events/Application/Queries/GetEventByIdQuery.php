<?php

namespace Src\Events\Application\Queries;

class GetEventByIdQuery
{
    public function __construct(
        public string $eventId
    ) {
    }
}
