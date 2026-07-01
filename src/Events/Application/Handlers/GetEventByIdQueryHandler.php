<?php

namespace Src\Events\Application\Handlers;

use App\Models\Event;
use Src\Events\Application\Queries\GetEventByIdQuery;

class GetEventByIdQueryHandler
{
    public function handle(GetEventByIdQuery $query): array
    {
        $event = Event::find($query->eventId);

        if (!$event) {
            throw new \Exception('Event not found');
        }

        return [
            'id' => $event->id,
            'title' => $event->title,
            'description' => $event->description,
            'start_date' => $event->start_date,
            'end_date' => $event->end_date,
            'location' => $event->location,
            'created_at' => $event->created_at,
            'updated_at' => $event->updated_at,
        ];
    }
}
