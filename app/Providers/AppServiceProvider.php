<?php

namespace App\Providers;

use App\Models\PersonalAccessToken;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Src\Identity\Domain\Repositories\UserRepositoryInterface;
use Src\Identity\Infrastructure\Repositories\EloquentUserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        ResetPassword::createUrlUsing(function (User $user, string $token) {
            return 'http://localhost:4200/reset-password?token=' . $token;
        });
    }
}
