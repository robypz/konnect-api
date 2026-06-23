<?php
namespace Src\Projects\Application\Commands;

class CreateProjectCommand {
    public string $title;
    public string $description;
    public string $ownerId;

    public function __construct(string $title, string $description, string $ownerId) {
        $this->title = $title;
        $this->description = $description;
        $this->ownerId = $ownerId;
    }
}
