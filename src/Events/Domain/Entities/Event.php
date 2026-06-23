<?php
namespace Src\Events\Domain\Entities;
use Src\Events\Domain\ValueObjects\EventId;
use Src\Events\Domain\ValueObjects\EventTitle;
use Src\Events\Domain\ValueObjects\EventDescription;
use Src\Events\Domain\ValueObjects\DateRange;
use Src\Events\Domain\ValueObjects\Location;

class Event {
    private EventId $id;
    private EventTitle $title;
    private EventDescription $description;
    private DateRange $dateRange;
    private Location $location;

    public function __construct(EventId $id, EventTitle $title, EventDescription $description, DateRange $dateRange, Location $location) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->dateRange = $dateRange;
        $this->location = $location;
    }

    public function getId(): EventId { return $this->id; }
    public function getTitle(): EventTitle { return $this->title; }
    public function getDescription(): EventDescription { return $this->description; }
    public function getDateRange(): DateRange { return $this->dateRange; }
    public function getLocation(): Location { return $this->location; }
}
