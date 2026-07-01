<?php

namespace Src\Communication\Application\Handlers;

use App\Models\Chat;
use Src\Communication\Application\Commands\CreateChatCommand;

class CreateChatCommandHandler
{
    public function handle(CreateChatCommand $command): array
    {
        $chat = Chat::create([
            'user_id' => $command->userId,
            'name' => $command->name,
            'description' => $command->description,
        ]);

        if (!empty($command->participantIds)) {
            $chat->participants()->attach($command->participantIds);
        }

        return [
            'id' => $chat->id,
            'user_id' => $chat->user_id,
            'name' => $chat->name,
            'description' => $chat->description,
            'created_at' => $chat->created_at,
        ];
    }
}
