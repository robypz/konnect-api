<?php

namespace Src\Events\Application\Handlers;

use App\Models\Event;
use Src\Events\Application\Commands\UpdateEventCommand;

class UpdateEventCommandHandler
{
    public function handle(UpdateEventCommand $command): array
    {
        $event = Event::find($command->eventId);

        if (!$event) {
            throw new \Exception('Event not found');
        }

        $updateData = [];
        if ($command->title !== null) {
            $updateData['title'] = $command->title;
        }
        if ($command->description !== null) {
            $updateData['description'] = $command->description;
        }
        if ($command->startDate !== null) {
            $updateData['start_date'] = $command->startDate;
        }
        if ($command->endDate !== null) {
            $updateData['end_date'] = $command->endDate;
        }
        if ($command->location !== null) {
            $updateData['location'] = $command->location;
        }

        $event->update($updateData);

        return [
            'id' => $event->id,
            'title' => $event->title,
            'description' => $event->description,
            'start_date' => $event->start_date,
            'end_date' => $event->end_date,
            'location' => $event->location,
            'updated_at' => $event->updated_at,
        ];
    }
}
