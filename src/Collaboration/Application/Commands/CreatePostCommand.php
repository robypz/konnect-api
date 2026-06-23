<?php
namespace Src\Collaboration\Application\Commands;

class CreatePostCommand {
    public string $content;
    public string $authorId;
    public ?string $groupId;

    public function __construct(string $content, string $authorId, ?string $groupId = null) {
        $this->content = $content;
        $this->authorId = $authorId;
        $this->groupId = $groupId;
    }
}
