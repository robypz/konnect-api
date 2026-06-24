<?php

namespace Src\Identity\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Identity\Application\Commands\SignInCommand;
use Src\Identity\Application\Handlers\SignInCommandHandler;

class SignInController
{
    public function __construct(
        private readonly SignInCommandHandler $signInCommandHandler,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'device_name' => ['nullable', 'string'],
        ]);

        $token = $this->signInCommandHandler->handle(new SignInCommand(
            email: $data['email'],
            password: $data['password'],
            deviceName: $data['device_name'] ?? 'default',
        ));

        return response()->json(['token' => $token], 200);
    }
}
