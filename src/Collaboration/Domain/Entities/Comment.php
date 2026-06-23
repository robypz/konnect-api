<?php
namespace Src\Collaboration\Domain\Entities;
use Src\Collaboration\Domain\ValueObjects\CommentId;
use Src\Collaboration\Domain\ValueObjects\PostId;
use Src\Collaboration\Domain\ValueObjects\CommentContent;
use Src\Identity\Domain\ValueObjects\UserId;

class Comment {
    private CommentId $id;
    private PostId $postId;
    private CommentContent $content;
    private UserId $authorId;

    public function __construct(CommentId $id, PostId $postId, CommentContent $content, UserId $authorId) {
        $this->id = $id;
        $this->postId = $postId;
        $this->content = $content;
        $this->authorId = $authorId;
    }

    public function getId(): CommentId { return $this->id; }
    public function getPostId(): PostId { return $this->postId; }
    public function getContent(): CommentContent { return $this->content; }
    public function getAuthorId(): UserId { return $this->authorId; }
}
