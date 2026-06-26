<?php

namespace Src\Identity\Application\Commands;

class SendPasswordResetLinkCommand
{
    public function __construct(public readonly string $email)
    {
    }
}
