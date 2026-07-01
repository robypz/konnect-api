<?php

namespace Src\Collaboration\Application\Commands;

class UpdatePostCommand
{
    public function __construct(
        public string $postId,
        public ?string $content = null,
        public ?string $title = null
    ) {
    }
}
