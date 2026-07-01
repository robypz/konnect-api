<?php

namespace Src\Communication\Application\Handlers;

use App\Models\Chat;
use Src\Communication\Application\Queries\GetChatByIdQuery;

class GetChatByIdQueryHandler
{
    public function handle(GetChatByIdQuery $query): array
    {
        $chat = Chat::with('participants', 'messages.user')
            ->find($query->chatId);

        if (!$chat) {
            throw new \Exception('Chat not found');
        }

        return [
            'id' => $chat->id,
            'user_id' => $chat->user_id,
            'name' => $chat->name,
            'description' => $chat->description,
            'participants' => $chat->participants,
            'messages' => $chat->messages,
            'created_at' => $chat->created_at,
            'updated_at' => $chat->updated_at,
        ];
    }
}
