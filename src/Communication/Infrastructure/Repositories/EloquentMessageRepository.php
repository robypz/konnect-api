<?php
namespace Src\Communication\Infrastructure\Repositories;

use App\Models\Message as EloquentMessage;
use Src\Communication\Domain\Entities\Message as DomainMessage;
use Src\Communication\Domain\Repositories\MessageRepositoryInterface;
use Src\Communication\Domain\ValueObjects\MessageId;
use Src\Communication\Infrastructure\Mappers\MessageDataMapper;

class EloquentMessageRepository implements MessageRepositoryInterface {
    public function save(DomainMessage $message): void {
        $eloquentMessage = EloquentMessage::find($message->getId()->value());
        
        if (!$eloquentMessage) {
            $eloquentMessage = new EloquentMessage();
            $eloquentMessage->_id = $message->getId()->value(); 
        }

        $eloquentMessage->chat_id = $message->getChatId()->value();
        $eloquentMessage->content = $message->getContent()->value();
        $eloquentMessage->sender_id = $message->getSenderId()->value();
        
        $eloquentMessage->save();
    }

    public function findById(MessageId $id): ?DomainMessage {
        $eloquentMessage = EloquentMessage::find($id->value());
        if (!$eloquentMessage) {
            return null;
        }
        return MessageDataMapper::toDomain($eloquentMessage);
    }
}
