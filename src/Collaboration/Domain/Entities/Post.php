<?php
namespace Src\Collaboration\Domain\Entities;
use Src\Collaboration\Domain\ValueObjects\PostId;
use Src\Collaboration\Domain\ValueObjects\PostContent;
use Src\Collaboration\Domain\ValueObjects\GroupId;
use Src\Identity\Domain\ValueObjects\UserId;

class Post {
    private PostId $id;
    private PostContent $content;
    private UserId $authorId;
    private ?GroupId $groupId;

    public function __construct(PostId $id, PostContent $content, UserId $authorId, ?GroupId $groupId = null) {
        $this->id = $id;
        $this->content = $content;
        $this->authorId = $authorId;
        $this->groupId = $groupId;
    }

    public function getId(): PostId { return $this->id; }
    public function getContent(): PostContent { return $this->content; }
    public function getAuthorId(): UserId { return $this->authorId; }
    public function getGroupId(): ?GroupId { return $this->groupId; }
}
