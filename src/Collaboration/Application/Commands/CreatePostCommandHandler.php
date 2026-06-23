<?php
namespace Src\Collaboration\Application\Commands;

use Src\Collaboration\Domain\Entities\Post;
use Src\Collaboration\Domain\Repositories\PostRepositoryInterface;
use Src\Collaboration\Domain\ValueObjects\PostId;
use Src\Collaboration\Domain\ValueObjects\PostContent;
use Src\Collaboration\Domain\ValueObjects\GroupId;
use Src\Identity\Domain\ValueObjects\UserId;
use Illuminate\Support\Str;

class CreatePostCommandHandler {
    private PostRepositoryInterface $repository;

    public function __construct(PostRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function handle(CreatePostCommand $command): void {
        $id = new PostId((string) Str::uuid());
        $content = new PostContent($command->content);
        $authorId = new UserId($command->authorId);
        $groupId = $command->groupId ? new GroupId($command->groupId) : null;

        $post = new Post($id, $content, $authorId, $groupId);
        $this->repository->save($post);
    }
}
