<?php
namespace Src\Collaboration\Application\Queries;

class GetPostByIdQuery {
    public string $id;

    public function __construct(string $id) {
        $this->id = $id;
    }
}
