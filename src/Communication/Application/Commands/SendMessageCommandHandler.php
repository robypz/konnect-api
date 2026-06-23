<?php
namespace Src\Communication\Application\Commands;

use Src\Communication\Domain\Entities\Message;
use Src\Communication\Domain\Repositories\MessageRepositoryInterface;
use Src\Communication\Domain\ValueObjects\MessageId;
use Src\Communication\Domain\ValueObjects\ChatId;
use Src\Communication\Domain\ValueObjects\MessageContent;
use Src\Communication\Domain\ValueObjects\ParticipantId;
use Illuminate\Support\Str;

class SendMessageCommandHandler {
    private MessageRepositoryInterface $repository;

    public function __construct(MessageRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function handle(SendMessageCommand $command): void {
        $id = new MessageId((string) Str::uuid());
        $chatId = new ChatId($command->chatId);
        $content = new MessageContent($command->content);
        $senderId = new ParticipantId($command->senderId);

        $message = new Message($id, $chatId, $content, $senderId);
        $this->repository->save($message);
    }
}
