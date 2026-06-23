<?php
namespace Src\Projects\Application\Commands;

class CreateTaskCommand {
    public string $projectId;
    public string $content;
    public string $statusId;

    public function __construct(string $projectId, string $content, string $statusId) {
        $this->projectId = $projectId;
        $this->content = $content;
        $this->statusId = $statusId;
    }
}
