<?php
namespace Src\Events\Application\Commands;

use Src\Events\Domain\Entities\Event;
use Src\Events\Domain\Repositories\EventRepositoryInterface;
use Src\Events\Domain\ValueObjects\EventId;
use Src\Events\Domain\ValueObjects\EventTitle;
use Src\Events\Domain\ValueObjects\EventDescription;
use Src\Events\Domain\ValueObjects\DateRange;
use Src\Events\Domain\ValueObjects\Location;
use Illuminate\Support\Str;

class CreateEventCommandHandler {
    private EventRepositoryInterface $repository;

    public function __construct(EventRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function handle(CreateEventCommand $command): void {
        $id = new EventId((string) Str::uuid());
        $title = new EventTitle($command->title);
        $description = new EventDescription($command->description);
        $dateRange = new DateRange($command->startDate, $command->endDate);
        $location = new Location($command->location);

        $event = new Event($id, $title, $description, $dateRange, $location);
        $this->repository->save($event);
    }
}
