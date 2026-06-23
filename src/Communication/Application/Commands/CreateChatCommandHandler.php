<?php
namespace Src\Communication\Application\Commands;

use Src\Communication\Domain\Entities\Chat;
use Src\Communication\Domain\Repositories\ChatRepositoryInterface;
use Src\Communication\Domain\ValueObjects\ChatId;
use Illuminate\Support\Str;

class CreateChatCommandHandler {
    private ChatRepositoryInterface $repository;

    public function __construct(ChatRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function handle(CreateChatCommand $command): void {
        $id = new ChatId((string) Str::uuid());
        $chat = new Chat($id);
        $this->repository->save($chat);
    }
}
