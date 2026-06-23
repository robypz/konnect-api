<?php
namespace Src\Events\Infrastructure\Repositories;

use App\Models\Event as EloquentEvent;
use Src\Events\Domain\Entities\Event as DomainEvent;
use Src\Events\Domain\Repositories\EventRepositoryInterface;
use Src\Events\Domain\ValueObjects\EventId;
use Src\Events\Infrastructure\Mappers\EventDataMapper;

class EloquentEventRepository implements EventRepositoryInterface {
    public function save(DomainEvent $event): void {
        $eloquentEvent = EloquentEvent::find($event->getId()->value());
        
        if (!$eloquentEvent) {
            $eloquentEvent = new EloquentEvent();
            $eloquentEvent->_id = $event->getId()->value(); 
        }

        $eloquentEvent->title = $event->getTitle()->value();
        $eloquentEvent->description = $event->getDescription()->value();
        $eloquentEvent->start_date = $event->getDateRange()->getStartDate()->format('Y-m-d H:i:s');
        $eloquentEvent->end_date = $event->getDateRange()->getEndDate()->format('Y-m-d H:i:s');
        $eloquentEvent->location = $event->getLocation()->value();
        
        $eloquentEvent->save();
    }

    public function findById(EventId $id): ?DomainEvent {
        $eloquentEvent = EloquentEvent::find($id->value());
        if (!$eloquentEvent) {
            return null;
        }
        return EventDataMapper::toDomain($eloquentEvent);
    }
}
