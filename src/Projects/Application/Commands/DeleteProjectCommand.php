<?php

namespace Src\Projects\Application\Commands;

class DeleteProjectCommand
{
    public function __construct(
        public string $projectId
    ) {
    }
}
