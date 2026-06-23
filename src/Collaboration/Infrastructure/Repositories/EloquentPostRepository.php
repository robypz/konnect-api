<?php
namespace Src\Collaboration\Infrastructure\Repositories;

use App\Models\Post as EloquentPost;
use Src\Collaboration\Domain\Entities\Post as DomainPost;
use Src\Collaboration\Domain\Repositories\PostRepositoryInterface;
use Src\Collaboration\Domain\ValueObjects\PostId;
use Src\Collaboration\Infrastructure\Mappers\PostDataMapper;

class EloquentPostRepository implements PostRepositoryInterface {
    public function save(DomainPost $post): void {
        $eloquentPost = EloquentPost::find($post->getId()->value());
        
        if (!$eloquentPost) {
            $eloquentPost = new EloquentPost();
            $eloquentPost->_id = $post->getId()->value(); 
        }

        $eloquentPost->content = $post->getContent()->value();
        $eloquentPost->user_id = $post->getAuthorId()->value();
        $eloquentPost->group_id = $post->getGroupId() ? $post->getGroupId()->value() : null;
        
        $eloquentPost->save();
    }

    public function findById(PostId $id): ?DomainPost {
        $eloquentPost = EloquentPost::find($id->value());
        if (!$eloquentPost) {
            return null;
        }
        return PostDataMapper::toDomain($eloquentPost);
    }
}
