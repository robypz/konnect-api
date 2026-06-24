<?php

namespace Src\Identity\Infrastructure\Http\Controllers\Queries;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Identity\Application\Handlers\GetAuthenticatedUserQueryHandler;
use Src\Identity\Application\Queries\GetAuthenticatedUserQuery;

class GetAuthenticatedUserController
{
    public function __construct(
        private readonly GetAuthenticatedUserQueryHandler $queryHandler,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $user = $this->queryHandler->handle(new GetAuthenticatedUserQuery($request->user()->id));

        return response()->json($user, 200);
    }
}
