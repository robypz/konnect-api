<?php
namespace Src\Communication\Domain\Repositories;

use Src\Communication\Domain\Entities\Chat;
use Src\Communication\Domain\ValueObjects\ChatId;

interface ChatRepositoryInterface {
    public function save(Chat $chat): void;
    public function findById(ChatId $id): ?Chat;
}
