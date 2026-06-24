<?php

namespace Src\Identity\Application\Queries;

class GetAuthenticatedUserQuery
{
    public function __construct(public readonly string $userId)
    {
    }
}
