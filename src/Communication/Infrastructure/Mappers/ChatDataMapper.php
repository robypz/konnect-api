<?php
namespace Src\Communication\Infrastructure\Mappers;

use App\Models\Chat as EloquentChat;
use Src\Communication\Domain\Entities\Chat as DomainChat;
use Src\Communication\Domain\ValueObjects\ChatId;

class ChatDataMapper {
    public static function toDomain(EloquentChat $eloquentChat): DomainChat {
        return new DomainChat(
            new ChatId((string) $eloquentChat->_id)
        );
    }
}
