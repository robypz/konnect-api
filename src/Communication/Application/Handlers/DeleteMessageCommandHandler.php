<?php

namespace Src\Communication\Application\Handlers;

use App\Models\Message;
use Src\Communication\Application\Commands\DeleteMessageCommand;

class DeleteMessageCommandHandler
{
    public function handle(DeleteMessageCommand $command): array
    {
        $message = Message::find($command->messageId);

        if (!$message) {
            throw new \Exception('Message not found');
        }

        $message->delete();

        return [
            'message' => 'Message deleted successfully',
            'id' => $command->messageId,
        ];
    }
}
