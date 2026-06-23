<?php
namespace Src\Collaboration\Infrastructure\Mappers;

use App\Models\Post as EloquentPost;
use Src\Collaboration\Domain\Entities\Post as DomainPost;
use Src\Collaboration\Domain\ValueObjects\PostId;
use Src\Collaboration\Domain\ValueObjects\PostContent;
use Src\Collaboration\Domain\ValueObjects\GroupId;
use Src\Identity\Domain\ValueObjects\UserId;

class PostDataMapper {
    public static function toDomain(EloquentPost $eloquentPost): DomainPost {
        $groupId = $eloquentPost->group_id ? new GroupId((string) $eloquentPost->group_id) : null;
        
        return new DomainPost(
            new PostId((string) $eloquentPost->_id),
            new PostContent($eloquentPost->content ?? ''),
            new UserId((string) $eloquentPost->user_id),
            $groupId
        );
    }
}
