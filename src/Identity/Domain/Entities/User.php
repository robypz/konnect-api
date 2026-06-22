<?php

namespace Src\Identity\Domain\Entities;

use Src\Identity\Domain\ValueObjects\UserId;
use Src\Identity\Domain\ValueObjects\Email;
use Src\Identity\Domain\ValueObjects\Password;
use Src\Identity\Domain\ValueObjects\UserName;

class User
{
    private UserId $id;
    private UserName $name;
    private Email $email;
    private Password $password;

    public function __construct(UserId $id, UserName $name, Email $email, Password $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getName(): UserName
    {
        return $this->name;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }
}
