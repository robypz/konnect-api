<?php
namespace Src\Events\Domain\ValueObjects;
use DateTimeImmutable;
use InvalidArgumentException;

class DateRange {
    private DateTimeImmutable $startDate;
    private DateTimeImmutable $endDate;

    public function __construct(DateTimeImmutable $startDate, DateTimeImmutable $endDate) {
        if ($startDate > $endDate) {
            throw new InvalidArgumentException("Start date must be before or equal to end date.");
        }
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function getStartDate(): DateTimeImmutable { return $this->startDate; }
    public function getEndDate(): DateTimeImmutable { return $this->endDate; }
}
