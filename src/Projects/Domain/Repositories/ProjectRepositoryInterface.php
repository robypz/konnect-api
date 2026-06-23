<?php
namespace Src\Projects\Domain\Repositories;

use Src\Projects\Domain\Entities\Project;
use Src\Projects\Domain\ValueObjects\ProjectId;

interface ProjectRepositoryInterface {
    public function save(Project $project): void;
    public function findById(ProjectId $id): ?Project;
}
