<?php

namespace Src\HR\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\HR\Application\Handlers\ListDepartmentsQueryHandler;
use Src\HR\Application\Queries\ListDepartmentsQuery;

class ListDepartmentsController
{
    public function __construct(
        private ListDepartmentsQueryHandler $handler,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $query = new ListDepartmentsQuery(
            page: $request->get('page', 1),
            perPage: $request->get('perPage', 15),
        );

        $departments = $this->handler->handle($query);

        return response()->json(['data' => $departments]);
    }
}
