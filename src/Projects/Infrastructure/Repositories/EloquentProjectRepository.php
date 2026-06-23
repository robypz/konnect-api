<?php
namespace Src\Projects\Infrastructure\Repositories;

use App\Models\Project as EloquentProject;
use Src\Projects\Domain\Entities\Project as DomainProject;
use Src\Projects\Domain\Repositories\ProjectRepositoryInterface;
use Src\Projects\Domain\ValueObjects\ProjectId;
use Src\Projects\Infrastructure\Mappers\ProjectDataMapper;

class EloquentProjectRepository implements ProjectRepositoryInterface {
    public function save(DomainProject $project): void {
        $eloquentProject = EloquentProject::find($project->getId()->value());
        
        if (!$eloquentProject) {
            $eloquentProject = new EloquentProject();
            $eloquentProject->_id = $project->getId()->value(); 
        }

        $eloquentProject->title = $project->getTitle()->value();
        $eloquentProject->description = $project->getDescription()->value();
        $eloquentProject->owner_id = $project->getOwnerId()->value();
        
        $eloquentProject->save();
    }

    public function findById(ProjectId $id): ?DomainProject {
        $eloquentProject = EloquentProject::find($id->value());
        if (!$eloquentProject) {
            return null;
        }
        return ProjectDataMapper::toDomain($eloquentProject);
    }
}
