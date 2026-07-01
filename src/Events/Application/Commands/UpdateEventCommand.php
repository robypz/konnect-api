<?php

namespace Src\Events\Application\Commands;

class UpdateEventCommand
{
    public function __construct(
        public string $eventId,
        public ?string $title = null,
        public ?string $description = null,
        public ?string $startDate = null,
        public ?string $endDate = null,
        public ?string $location = null
    ) {
    }
}
