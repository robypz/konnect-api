<?php
namespace Src\Projects\Domain\ValueObjects;
use InvalidArgumentException;
class FileUrl {
    private string $url;
    public function __construct(string $url) {
        if (!filter_var($url, FILTER_VALIDATE_URL) && !str_starts_with($url, '/')) {
            throw new InvalidArgumentException("Invalid file URL.");
        }
        $this->url = $url;
    }
    public function value(): string { return $this->url; }
}
