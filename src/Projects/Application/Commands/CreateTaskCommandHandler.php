<?php
namespace Src\Projects\Application\Commands;

use Src\Projects\Domain\Entities\Task;
use Src\Projects\Domain\Repositories\TaskRepositoryInterface;
use Src\Projects\Domain\ValueObjects\TaskId;
use Src\Projects\Domain\ValueObjects\ProjectId;
use Src\Projects\Domain\ValueObjects\TaskContent;
use Src\Projects\Domain\ValueObjects\StatusId;
use Illuminate\Support\Str;

class CreateTaskCommandHandler {
    private TaskRepositoryInterface $repository;

    public function __construct(TaskRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function handle(CreateTaskCommand $command): void {
        $id = new TaskId((string) Str::uuid());
        $projectId = new ProjectId($command->projectId);
        $content = new TaskContent($command->content);
        $statusId = new StatusId($command->statusId);

        $task = new Task($id, $projectId, $content, $statusId);
        $this->repository->save($task);
    }
}
