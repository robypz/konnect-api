<?php
namespace Src\Projects\Infrastructure\Mappers;

use App\Models\Task as EloquentTask;
use Src\Projects\Domain\Entities\Task as DomainTask;
use Src\Projects\Domain\ValueObjects\TaskId;
use Src\Projects\Domain\ValueObjects\ProjectId;
use Src\Projects\Domain\ValueObjects\TaskContent;
use Src\Projects\Domain\ValueObjects\StatusId;

class TaskDataMapper {
    public static function toDomain(EloquentTask $eloquentTask): DomainTask {
        return new DomainTask(
            new TaskId((string) $eloquentTask->_id),
            new ProjectId((string) $eloquentTask->project_id),
            new TaskContent($eloquentTask->content ?? ''),
            new StatusId((string) $eloquentTask->status_id)
        );
    }
}
