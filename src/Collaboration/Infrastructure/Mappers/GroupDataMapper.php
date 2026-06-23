<?php
namespace Src\Collaboration\Infrastructure\Mappers;

use App\Models\Group as EloquentGroup;
use Src\Collaboration\Domain\Entities\Group as DomainGroup;
use Src\Collaboration\Domain\ValueObjects\GroupId;

class GroupDataMapper {
    public static function toDomain(EloquentGroup $eloquentGroup): DomainGroup {
        return new DomainGroup(
            new GroupId((string) $eloquentGroup->_id),
            $eloquentGroup->name
        );
    }
}
