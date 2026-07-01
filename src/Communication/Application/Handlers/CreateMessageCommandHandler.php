<?php

namespace Src\Communication\Application\Handlers;

use App\Models\Message;
use Src\Communication\Application\Commands\CreateMessageCommand;

class CreateMessageCommandHandler
{
    public function handle(CreateMessageCommand $command): array
    {
        $message = Message::create([
            'chat_id' => $command->chatId,
            'user_id' => $command->userId,
            'content' => $command->content,
        ]);

        return [
            'id' => $message->id,
            'chat_id' => $message->chat_id,
            'user_id' => $message->user_id,
            'content' => $message->content,
            'created_at' => $message->created_at,
        ];
    }
}
