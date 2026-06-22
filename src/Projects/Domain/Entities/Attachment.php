<?php
namespace Src\Projects\Domain\Entities;
use Src\Projects\Domain\ValueObjects\AttachmentId;
use Src\Projects\Domain\ValueObjects\FileName;
use Src\Projects\Domain\ValueObjects\FileUrl;

class Attachment {
    private AttachmentId $id;
    private FileName $name;
    private FileUrl $url;

    public function __construct(AttachmentId $id, FileName $name, FileUrl $url) {
        $this->id = $id;
        $this->name = $name;
        $this->url = $url;
    }

    public function getId(): AttachmentId { return $this->id; }
    public function getName(): FileName { return $this->name; }
    public function getUrl(): FileUrl { return $this->url; }
}
