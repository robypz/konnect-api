<?php
namespace Src\Projects\Infrastructure\Repositories;

use App\Models\Task as EloquentTask;
use Src\Projects\Domain\Entities\Task as DomainTask;
use Src\Projects\Domain\Repositories\TaskRepositoryInterface;
use Src\Projects\Domain\ValueObjects\TaskId;
use Src\Projects\Infrastructure\Mappers\TaskDataMapper;

class EloquentTaskRepository implements TaskRepositoryInterface {
    public function save(DomainTask $task): void {
        $eloquentTask = EloquentTask::find($task->getId()->value());
        
        if (!$eloquentTask) {
            $eloquentTask = new EloquentTask();
            $eloquentTask->_id = $task->getId()->value(); 
        }

        $eloquentTask->project_id = $task->getProjectId()->value();
        $eloquentTask->content = $task->getContent()->value();
        $eloquentTask->status_id = $task->getStatusId()->value();
        
        $eloquentTask->save();
    }

    public function findById(TaskId $id): ?DomainTask {
        $eloquentTask = EloquentTask::find($id->value());
        if (!$eloquentTask) {
            return null;
        }
        return TaskDataMapper::toDomain($eloquentTask);
    }
}
