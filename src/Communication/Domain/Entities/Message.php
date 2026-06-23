<?php
namespace Src\Communication\Domain\Entities;
use Src\Communication\Domain\ValueObjects\MessageId;
use Src\Communication\Domain\ValueObjects\ChatId;
use Src\Communication\Domain\ValueObjects\MessageContent;
use Src\Communication\Domain\ValueObjects\ParticipantId;

class Message {
    private MessageId $id;
    private ChatId $chatId;
    private MessageContent $content;
    private ParticipantId $senderId;

    public function __construct(MessageId $id, ChatId $chatId, MessageContent $content, ParticipantId $senderId) {
        $this->id = $id;
        $this->chatId = $chatId;
        $this->content = $content;
        $this->senderId = $senderId;
    }

    public function getId(): MessageId { return $this->id; }
    public function getChatId(): ChatId { return $this->chatId; }
    public function getContent(): MessageContent { return $this->content; }
    public function getSenderId(): ParticipantId { return $this->senderId; }
}
