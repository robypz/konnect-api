<?php

namespace Src\Projects\Application\Commands;

class UpdateProjectCommand
{
    public function __construct(
        public string $projectId,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $startDate = null,
        public ?string $endDate = null,
        public ?string $status = null
    ) {
    }
}
