<?php

namespace Src\Communication\Application\Commands;

class DeleteChatCommand
{
    public function __construct(
        public string $chatId
    ) {
    }
}
