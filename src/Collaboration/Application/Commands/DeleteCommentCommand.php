<?php

namespace Src\Collaboration\Application\Commands;

class DeleteCommentCommand
{
    public function __construct(
        public string $commentId
    ) {
    }
}
