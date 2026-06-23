<?php
namespace Src\Collaboration\Domain\Repositories;

use Src\Collaboration\Domain\Entities\Group;
use Src\Collaboration\Domain\ValueObjects\GroupId;

interface GroupRepositoryInterface {
    public function save(Group $group): void;
    public function findById(GroupId $id): ?Group;
}
