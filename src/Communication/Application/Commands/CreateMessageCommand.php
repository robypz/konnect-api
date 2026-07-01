<?php

namespace Src\Communication\Application\Commands;

class CreateMessageCommand
{
    public function __construct(
        public string $chatId,
        public string $userId,
        public string $content
    ) {
    }
}
