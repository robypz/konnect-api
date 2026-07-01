<?php

namespace Src\Communication\Application\Handlers;

use App\Models\Chat;
use Src\Communication\Application\Queries\ListChatsQuery;

class ListChatsQueryHandler
{
    public function handle(ListChatsQuery $query): array
    {
        $chats = Chat::where('user_id', $query->userId)
            ->orWhereHas('participants', function ($q) {
                $q->where('user_id', $query->userId);
            })
            ->with('participants', 'messages')
            ->paginate($query->perPage, ['*'], 'page', $query->page);

        return [
            'data' => $chats->items(),
            'pagination' => [
                'total' => $chats->total(),
                'per_page' => $chats->perPage(),
                'current_page' => $chats->currentPage(),
                'last_page' => $chats->lastPage(),
            ],
        ];
    }
}
