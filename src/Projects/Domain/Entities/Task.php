<?php
namespace Src\Projects\Domain\Entities;
use Src\Projects\Domain\ValueObjects\TaskId;
use Src\Projects\Domain\ValueObjects\ProjectId;
use Src\Projects\Domain\ValueObjects\TaskContent;
use Src\Projects\Domain\ValueObjects\StatusId;

class Task {
    private TaskId $id;
    private ProjectId $projectId;
    private TaskContent $content;
    private StatusId $statusId;

    public function __construct(TaskId $id, ProjectId $projectId, TaskContent $content, StatusId $statusId) {
        $this->id = $id;
        $this->projectId = $projectId;
        $this->content = $content;
        $this->statusId = $statusId;
    }

    public function getId(): TaskId { return $this->id; }
    public function getProjectId(): ProjectId { return $this->projectId; }
    public function getContent(): TaskContent { return $this->content; }
    public function getStatusId(): StatusId { return $this->statusId; }
}
