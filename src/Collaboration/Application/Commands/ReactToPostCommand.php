<?php

namespace Src\Collaboration\Application\Commands;

class ReactToPostCommand
{
    public function __construct(
        public string $postId,
        public string $userId,
        public string $reactionType
    ) {
    }
}
