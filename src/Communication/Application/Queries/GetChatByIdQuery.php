<?php

namespace Src\Communication\Application\Queries;

class GetChatByIdQuery
{
    public function __construct(
        public string $chatId
    ) {
    }
}
