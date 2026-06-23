<?php
namespace Src\Collaboration\Domain\Repositories;

use Src\Collaboration\Domain\Entities\Post;
use Src\Collaboration\Domain\ValueObjects\PostId;

interface PostRepositoryInterface {
    public function save(Post $post): void;
    public function findById(PostId $id): ?Post;
}
