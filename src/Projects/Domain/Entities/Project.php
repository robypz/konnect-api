<?php
namespace Src\Projects\Domain\Entities;
use Src\Projects\Domain\ValueObjects\ProjectId;
use Src\Projects\Domain\ValueObjects\ProjectTitle;
use Src\Projects\Domain\ValueObjects\ProjectDescription;
use Src\HR\Domain\ValueObjects\EmployeeId;

class Project {
    private ProjectId $id;
    private ProjectTitle $title;
    private ProjectDescription $description;
    private EmployeeId $ownerId;

    public function __construct(ProjectId $id, ProjectTitle $title, ProjectDescription $description, EmployeeId $ownerId) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->ownerId = $ownerId;
    }

    public function getId(): ProjectId { return $this->id; }
    public function getTitle(): ProjectTitle { return $this->title; }
    public function getDescription(): ProjectDescription { return $this->description; }
    public function getOwnerId(): EmployeeId { return $this->ownerId; }
}
