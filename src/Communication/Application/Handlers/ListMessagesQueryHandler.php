<?php

namespace Src\Communication\Application\Handlers;

use App\Models\Message;
use Src\Communication\Application\Queries\ListMessagesQuery;

class ListMessagesQueryHandler
{
    public function handle(ListMessagesQuery $query): array
    {
        $messages = Message::where('chat_id', $query->chatId)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate($query->perPage, ['*'], 'page', $query->page);

        return [
            'data' => $messages->items(),
            'pagination' => [
                'total' => $messages->total(),
                'per_page' => $messages->perPage(),
                'current_page' => $messages->currentPage(),
                'last_page' => $messages->lastPage(),
            ],
        ];
    }
}
