<?php
namespace Src\Projects\Application\Queries;

class GetProjectByIdQuery {
    public string $id;

    public function __construct(string $id) {
        $this->id = $id;
    }
}
