<?php

namespace Src\Events\Application\Handlers;

use App\Models\Event;
use Src\Events\Application\Commands\CreateEventCommand;

class CreateEventCommandHandler
{
    public function handle(CreateEventCommand $command): array
    {
        $event = Event::create([
            'title' => $command->title,
            'description' => $command->description,
            'start_date' => $command->startDate,
            'end_date' => $command->endDate,
            'location' => $command->location,
        ]);

        return [
            'id' => $event->id,
            'title' => $event->title,
            'description' => $event->description,
            'start_date' => $event->start_date,
            'end_date' => $event->end_date,
            'location' => $event->location,
            'created_at' => $event->created_at,
        ];
    }
}
