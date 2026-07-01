<?php

namespace Src\Collaboration\Application\Handlers;

use App\Models\Comment;
use Src\Collaboration\Application\Queries\ListCommentsQuery;

class ListCommentsQueryHandler
{
    public function handle(ListCommentsQuery $query): array
    {
        $comments = Comment::where('post_id', $query->postId)
            ->with('user')
            ->paginate($query->perPage, ['*'], 'page', $query->page);

        return [
            'data' => $comments->items(),
            'pagination' => [
                'total' => $comments->total(),
                'per_page' => $comments->perPage(),
                'current_page' => $comments->currentPage(),
                'last_page' => $comments->lastPage(),
            ],
        ];
    }
}
