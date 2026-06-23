<?php
namespace Src\Events\Domain\ValueObjects;
class Location {
    private string $address;
    public function __construct(string $address) {
        $this->address = $address;
    }
    public function value(): string { return $this->address; }
}
