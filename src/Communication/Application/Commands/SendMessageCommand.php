<?php
namespace Src\Communication\Application\Commands;

class SendMessageCommand {
    public string $chatId;
    public string $content;
    public string $senderId;

    public function __construct(string $chatId, string $content, string $senderId) {
        $this->chatId = $chatId;
        $this->content = $content;
        $this->senderId = $senderId;
    }
}
