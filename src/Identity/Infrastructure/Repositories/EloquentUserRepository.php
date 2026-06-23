<?php
namespace Src\Identity\Infrastructure\Repositories;

use App\Models\User as EloquentUser;
use Src\Identity\Domain\Entities\User as DomainUser;
use Src\Identity\Domain\Repositories\UserRepositoryInterface;
use Src\Identity\Domain\ValueObjects\UserId;
use Src\Identity\Infrastructure\Mappers\UserDataMapper;

class EloquentUserRepository implements UserRepositoryInterface {
    public function save(DomainUser $user): void {
        $eloquentUser = EloquentUser::find($user->getId()->value());
        
        if (!$eloquentUser) {
            $eloquentUser = new EloquentUser();
            $eloquentUser->_id = $user->getId()->value(); 
        }

        $eloquentUser->name = $user->getName()->value();
        $eloquentUser->email = $user->getEmail()->value();
        $eloquentUser->password = $user->getPassword()->value();
        
        $eloquentUser->save();
    }

    public function findById(UserId $id): ?DomainUser {
        $eloquentUser = EloquentUser::find($id->value());
        if (!$eloquentUser) {
            return null;
        }
        return UserDataMapper::toDomain($eloquentUser);
    }

    public function findByEmail(string $email): ?DomainUser {
        $eloquentUser = EloquentUser::where('email', $email)->first();
        if (!$eloquentUser) {
            return null;
        }
        return UserDataMapper::toDomain($eloquentUser);
    }
}
