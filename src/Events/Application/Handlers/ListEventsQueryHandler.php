<?php

namespace Src\Events\Application\Handlers;

use App\Models\Event;
use Src\Events\Application\Queries\ListEventsQuery;

class ListEventsQueryHandler
{
    public function handle(ListEventsQuery $query): array
    {
        $events = Event::paginate($query->perPage, ['*'], 'page', $query->page);

        return [
            'data' => $events->items(),
            'pagination' => [
                'total' => $events->total(),
                'per_page' => $events->perPage(),
                'current_page' => $events->currentPage(),
                'last_page' => $events->lastPage(),
            ],
        ];
    }
}
