<?php
namespace Src\Events\Domain\Repositories;

use Src\Events\Domain\Entities\Event;
use Src\Events\Domain\ValueObjects\EventId;

interface EventRepositoryInterface {
    public function save(Event $event): void;
    public function findById(EventId $id): ?Event;
}
