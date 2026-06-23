<?php
namespace Src\Communication\Infrastructure\Repositories;

use App\Models\Chat as EloquentChat;
use Src\Communication\Domain\Entities\Chat as DomainChat;
use Src\Communication\Domain\Repositories\ChatRepositoryInterface;
use Src\Communication\Domain\ValueObjects\ChatId;
use Src\Communication\Infrastructure\Mappers\ChatDataMapper;

class EloquentChatRepository implements ChatRepositoryInterface {
    public function save(DomainChat $chat): void {
        $eloquentChat = EloquentChat::find($chat->getId()->value());
        
        if (!$eloquentChat) {
            $eloquentChat = new EloquentChat();
            $eloquentChat->_id = $chat->getId()->value(); 
        }
        
        $eloquentChat->save();
    }

    public function findById(ChatId $id): ?DomainChat {
        $eloquentChat = EloquentChat::find($id->value());
        if (!$eloquentChat) {
            return null;
        }
        return ChatDataMapper::toDomain($eloquentChat);
    }
}
