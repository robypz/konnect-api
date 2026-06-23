<?php
namespace Src\Events\Infrastructure\Mappers;

use App\Models\Event as EloquentEvent;
use Src\Events\Domain\Entities\Event as DomainEvent;
use Src\Events\Domain\ValueObjects\EventId;
use Src\Events\Domain\ValueObjects\EventTitle;
use Src\Events\Domain\ValueObjects\EventDescription;
use Src\Events\Domain\ValueObjects\DateRange;
use Src\Events\Domain\ValueObjects\Location;
use DateTimeImmutable;

class EventDataMapper {
    public static function toDomain(EloquentEvent $eloquentEvent): DomainEvent {
        return new DomainEvent(
            new EventId((string) $eloquentEvent->_id),
            new EventTitle($eloquentEvent->title),
            new EventDescription($eloquentEvent->description ?? ''),
            new DateRange(new DateTimeImmutable($eloquentEvent->start_date), new DateTimeImmutable($eloquentEvent->end_date)),
            new Location($eloquentEvent->location ?? '')
        );
    }
}
