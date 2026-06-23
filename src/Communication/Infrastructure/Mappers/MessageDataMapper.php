<?php
namespace Src\Communication\Infrastructure\Mappers;

use App\Models\Message as EloquentMessage;
use Src\Communication\Domain\Entities\Message as DomainMessage;
use Src\Communication\Domain\ValueObjects\MessageId;
use Src\Communication\Domain\ValueObjects\ChatId;
use Src\Communication\Domain\ValueObjects\MessageContent;
use Src\Communication\Domain\ValueObjects\ParticipantId;

class MessageDataMapper {
    public static function toDomain(EloquentMessage $eloquentMessage): DomainMessage {
        return new DomainMessage(
            new MessageId((string) $eloquentMessage->_id),
            new ChatId((string) $eloquentMessage->chat_id),
            new MessageContent($eloquentMessage->content ?? ''),
            new ParticipantId((string) $eloquentMessage->sender_id)
        );
    }
}
