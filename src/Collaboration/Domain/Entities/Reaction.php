<?php
namespace Src\Collaboration\Domain\Entities;
use Src\Collaboration\Domain\ValueObjects\ReactionId;
use Src\Collaboration\Domain\ValueObjects\PostId;
use Src\Collaboration\Domain\ValueObjects\ReactionType;
use Src\Identity\Domain\ValueObjects\UserId;

class Reaction {
    private ReactionId $id;
    private PostId $postId;
    private ReactionType $type;
    private UserId $userId;

    public function __construct(ReactionId $id, PostId $postId, ReactionType $type, UserId $userId) {
        $this->id = $id;
        $this->postId = $postId;
        $this->type = $type;
        $this->userId = $userId;
    }

    public function getId(): ReactionId { return $this->id; }
    public function getPostId(): PostId { return $this->postId; }
    public function getType(): ReactionType { return $this->type; }
    public function getUserId(): UserId { return $this->userId; }
}
