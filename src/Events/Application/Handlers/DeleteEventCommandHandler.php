<?php

namespace Src\Events\Application\Handlers;

use App\Models\Event;
use Src\Events\Application\Commands\DeleteEventCommand;

class DeleteEventCommandHandler
{
    public function handle(DeleteEventCommand $command): array
    {
        $event = Event::find($command->eventId);

        if (!$event) {
            throw new \Exception('Event not found');
        }

        $event->delete();

        return [
            'message' => 'Event deleted successfully',
            'id' => $command->eventId,
        ];
    }
}
