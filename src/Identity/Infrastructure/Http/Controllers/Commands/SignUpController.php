<?php

namespace Src\Identity\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Identity\Application\Commands\SignUpCommand;
use Src\Identity\Application\Handlers\SignUpCommandHandler;

class SignUpController
{
    public function __construct(
        private readonly SignUpCommandHandler $handler,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'device_name' => ['nullable', 'string'],
        ]);

        $token = $this->handler->handle(new SignUpCommand(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
            deviceName: $data['device_name'] ?? 'default',
        ));

        return response()->json(['token' => $token], 201);
    }
}
