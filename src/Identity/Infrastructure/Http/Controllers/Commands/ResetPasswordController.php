<?php

namespace Src\Identity\Infrastructure\Http\Controllers\Commands;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Identity\Application\Commands\ResetPasswordCommand;
use Src\Identity\Application\Handlers\ResetPasswordCommandHandler;

class ResetPasswordController
{
    public function __construct(
        private readonly ResetPasswordCommandHandler $handler,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->validate([
            'token' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $status = $this->handler->handle(new ResetPasswordCommand(
            token: $data['token'],
            email: $data['email'],
            password: $data['password'],
            passwordConfirmation: $data['password_confirmation'],
        ));

        return response()->json(['status' => $status], 200);
    }
}
