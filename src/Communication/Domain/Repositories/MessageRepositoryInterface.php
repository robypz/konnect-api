<?php
namespace Src\Communication\Domain\Repositories;

use Src\Communication\Domain\Entities\Message;
use Src\Communication\Domain\ValueObjects\MessageId;

interface MessageRepositoryInterface {
    public function save(Message $message): void;
    public function findById(MessageId $id): ?Message;
}
