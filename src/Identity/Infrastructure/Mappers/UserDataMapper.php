<?php
namespace Src\Identity\Infrastructure\Mappers;

use App\Models\User as EloquentUser;
use Src\Identity\Domain\Entities\User as DomainUser;
use Src\Identity\Domain\ValueObjects\UserId;
use Src\Identity\Domain\ValueObjects\UserName;
use Src\Identity\Domain\ValueObjects\Email;
use Src\Identity\Domain\ValueObjects\Password;

class UserDataMapper {
    public static function toDomain(EloquentUser $eloquentUser): DomainUser {
        return new DomainUser(
            new UserId((string) $eloquentUser->_id), // O $eloquentUser->id
            new UserName($eloquentUser->name),
            new Email($eloquentUser->email),
            new Password($eloquentUser->password)
        );
    }
}
