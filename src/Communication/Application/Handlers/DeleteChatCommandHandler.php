<?php

namespace Src\Communication\Application\Handlers;

use App\Models\Chat;
use Src\Communication\Application\Commands\DeleteChatCommand;

class DeleteChatCommandHandler
{
    public function handle(DeleteChatCommand $command): array
    {
        $chat = Chat::find($command->chatId);

        if (!$chat) {
            throw new \Exception('Chat not found');
        }

        $chat->delete();

        return [
            'message' => 'Chat deleted successfully',
            'id' => $command->chatId,
        ];
    }
}
