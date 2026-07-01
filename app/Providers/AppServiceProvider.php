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

        // HR Handlers
        $this->app->bind(
            \Src\HR\Application\Handlers\GetEmployeeTasksQueryHandler::class,
            function ($app) {
                return new \Src\HR\Application\Handlers\GetEmployeeTasksQueryHandler();
            }
        );

        $this->app->bind(
            \Src\HR\Application\Handlers\GetEmployeePostsQueryHandler::class,
            function ($app) {
                return new \Src\HR\Application\Handlers\GetEmployeePostsQueryHandler();
            }
        );

        $this->app->bind(
            \Src\HR\Application\Handlers\GetEmployeeEventsQueryHandler::class,
            function ($app) {
                return new \Src\HR\Application\Handlers\GetEmployeeEventsQueryHandler();
            }
        );

        $this->app->bind(
            \Src\HR\Application\Handlers\GetEmployeeProjectsQueryHandler::class,
            function ($app) {
                return new \Src\HR\Application\Handlers\GetEmployeeProjectsQueryHandler();
            }
        );

        // Department Handlers
        $this->app->bind(
            \Src\HR\Application\Handlers\CreateDepartmentCommandHandler::class,
            function ($app) {
                return new \Src\HR\Application\Handlers\CreateDepartmentCommandHandler();
            }
        );

        $this->app->bind(
            \Src\HR\Application\Handlers\UpdateDepartmentCommandHandler::class,
            function ($app) {
                return new \Src\HR\Application\Handlers\UpdateDepartmentCommandHandler();
            }
        );

        $this->app->bind(
            \Src\HR\Application\Handlers\DeleteDepartmentCommandHandler::class,
            function ($app) {
                return new \Src\HR\Application\Handlers\DeleteDepartmentCommandHandler();
            }
        );

        $this->app->bind(
            \Src\HR\Application\Handlers\ListDepartmentsQueryHandler::class,
            function ($app) {
                return new \Src\HR\Application\Handlers\ListDepartmentsQueryHandler();
            }
        );

        $this->app->bind(
            \Src\HR\Application\Handlers\GetDepartmentByIdQueryHandler::class,
            function ($app) {
                return new \Src\HR\Application\Handlers\GetDepartmentByIdQueryHandler();
            }
        );
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
