<?php

namespace Src\Collaboration\Application\Handlers;

use App\Models\Post;
use Src\Collaboration\Application\Queries\ListPostsQuery;

class ListPostsQueryHandler
{
    public function handle(ListPostsQuery $query): array
    {
        $posts = Post::with(['user', 'comments', 'reactions'])
            ->paginate($query->perPage, ['*'], 'page', $query->page);

        return [
            'data' => $posts->items(),
            'pagination' => [
                'total' => $posts->total(),
                'per_page' => $posts->perPage(),
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
            ],
        ];
    }
}
