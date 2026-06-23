<?php
namespace Src\Projects\Infrastructure\Mappers;

use App\Models\Project as EloquentProject;
use Src\Projects\Domain\Entities\Project as DomainProject;
use Src\Projects\Domain\ValueObjects\ProjectId;
use Src\Projects\Domain\ValueObjects\ProjectTitle;
use Src\Projects\Domain\ValueObjects\ProjectDescription;
use Src\HR\Domain\ValueObjects\EmployeeId;

class ProjectDataMapper {
    public static function toDomain(EloquentProject $eloquentProject): DomainProject {
        return new DomainProject(
            new ProjectId((string) $eloquentProject->_id),
            new ProjectTitle($eloquentProject->title),
            new ProjectDescription($eloquentProject->description ?? ''),
            new EmployeeId((string) $eloquentProject->owner_id)
        );
    }
}
