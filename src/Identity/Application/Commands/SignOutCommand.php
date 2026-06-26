<?php

namespace Src\Identity\Application\Commands;

class SignOutCommand
{
    public function __construct(public readonly int $userId, public readonly string $tokenId)
    {
    }
}
