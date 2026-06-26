<?php

namespace Src\Identity\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Identity\Application\Commands\SendPasswordResetLinkCommand;
use Src\Identity\Application\Handlers\SendPasswordResetLinkCommandHandler;

class SendPasswordResetLinkController
{
    public function __construct(
        private readonly SendPasswordResetLinkCommandHandler $handler,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = $this->handler->handle(new SendPasswordResetLinkCommand(
            email: $data['email'],
        ));

        return response()->json(['status' => $status], 200);
    }
}
