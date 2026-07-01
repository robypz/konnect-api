<?php

namespace Src\Communication\Application\Commands;

class DeleteMessageCommand
{
    public function __construct(
        public string $messageId
    ) {
    }
}
