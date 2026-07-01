<?php

namespace Src\Collaboration\Application\Commands;

class DeletePostCommand
{
    public function __construct(
        public string $postId
    ) {
    }
}
