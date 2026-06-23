<?php
namespace Src\Projects\Domain\Repositories;

use Src\Projects\Domain\Entities\Task;
use Src\Projects\Domain\ValueObjects\TaskId;

interface TaskRepositoryInterface {
    public function save(Task $task): void;
    public function findById(TaskId $id): ?Task;
}
