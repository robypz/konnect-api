<?php

namespace Src\Identity\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Identity\Application\Commands\SignOutCommand;
use Src\Identity\Application\Handlers\SignOutCommandHandler;

class SignOutController
{
    public function __construct(
        private readonly SignOutCommandHandler $handler,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $user = $request->user();
        $tokenId = $request->bearerToken();

        $this->handler->handle(new SignOutCommand(
            userId: $user->id,
            tokenId: $tokenId ?? '',
        ));

        return response()->json(['message' => 'Signed out successfully'], 200);
    }
}
