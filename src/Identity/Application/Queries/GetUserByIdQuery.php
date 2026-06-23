<?php
namespace Src\Identity\Application\Queries;

class GetUserByIdQuery {
    public string $id;

    public function __construct(string $id) {
        $this->id = $id;
    }
}
