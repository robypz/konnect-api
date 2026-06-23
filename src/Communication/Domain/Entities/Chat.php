<?php
namespace Src\Communication\Domain\Entities;
use Src\Communication\Domain\ValueObjects\ChatId;

class Chat {
    private ChatId $id;

    public function __construct(ChatId $id) {
        $this->id = $id;
    }

    public function getId(): ChatId { return $this->id; }
}
