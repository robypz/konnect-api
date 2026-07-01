<?php

namespace Src\Projects\Application\Commands;

class AddTaskToProjectCommand
{
    public function __construct(
        public string $projectId,
        public string $taskId
    ) {
    }
}
