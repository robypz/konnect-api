<?php

namespace Src\Events\Application\Commands;

class DeleteEventCommand
{
    public function __construct(
        public string $eventId
    ) {
    }
}
