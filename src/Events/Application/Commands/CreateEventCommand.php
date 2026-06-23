<?php
namespace Src\Events\Application\Commands;

use DateTimeImmutable;

class CreateEventCommand {
    public string $title;
    public string $description;
    public DateTimeImmutable $startDate;
    public DateTimeImmutable $endDate;
    public string $location;

    public function __construct(string $title, string $description, DateTimeImmutable $startDate, DateTimeImmutable $endDate, string $location) {
        $this->title = $title;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->location = $location;
    }
}
