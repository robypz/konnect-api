<?php
namespace Src\Projects\Application\Commands;

use Src\Projects\Domain\Entities\Project;
use Src\Projects\Domain\Repositories\ProjectRepositoryInterface;
use Src\Projects\Domain\ValueObjects\ProjectId;
use Src\Projects\Domain\ValueObjects\ProjectTitle;
use Src\Projects\Domain\ValueObjects\ProjectDescription;
use Src\HR\Domain\ValueObjects\EmployeeId;
use Illuminate\Support\Str;

class CreateProjectCommandHandler {
    private ProjectRepositoryInterface $repository;

    public function __construct(ProjectRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function handle(CreateProjectCommand $command): void {
        $id = new ProjectId((string) Str::uuid());
        $title = new ProjectTitle($command->title);
        $description = new ProjectDescription($command->description);
        $ownerId = new EmployeeId($command->ownerId);

        $project = new Project($id, $title, $description, $ownerId);
        $this->repository->save($project);
    }
}
