<?php

namespace Src\Collaboration\Application\Commands;

class CreateCommentCommand
{
    public function __construct(
        public string $postId,
        public string $userId,
        public string $content
    ) {
    }
}
