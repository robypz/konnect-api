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

        // Projects Handlers
        $this->app->bind(
            \Src\Projects\Application\Handlers\CreateProjectCommandHandler::class,
            function ($app) {
                return new \Src\Projects\Application\Handlers\CreateProjectCommandHandler();
            }
        );

        $this->app->bind(
            \Src\Projects\Application\Handlers\UpdateProjectCommandHandler::class,
            function ($app) {
                return new \Src\Projects\Application\Handlers\UpdateProjectCommandHandler();
            }
        );

        $this->app->bind(
            \Src\Projects\Application\Handlers\DeleteProjectCommandHandler::class,
            function ($app) {
                return new \Src\Projects\Application\Handlers\DeleteProjectCommandHandler();
            }
        );

        $this->app->bind(
            \Src\Projects\Application\Handlers\UpdateProjectEmployeesCommandHandler::class,
            function ($app) {
                return new \Src\Projects\Application\Handlers\UpdateProjectEmployeesCommandHandler();
            }
        );

        $this->app->bind(
            \Src\Projects\Application\Handlers\AddTaskToProjectCommandHandler::class,
            function ($app) {
                return new \Src\Projects\Application\Handlers\AddTaskToProjectCommandHandler();
            }
        );

        $this->app->bind(
            \Src\Projects\Application\Handlers\ListProjectsQueryHandler::class,
            function ($app) {
                return new \Src\Projects\Application\Handlers\ListProjectsQueryHandler();
            }
        );

        $this->app->bind(
            \Src\Projects\Application\Handlers\GetProjectByIdQueryHandler::class,
            function ($app) {
                return new \Src\Projects\Application\Handlers\GetProjectByIdQueryHandler();
            }
        );

        $this->app->bind(
            \Src\Projects\Application\Handlers\ListProjectsByEmployeeQueryHandler::class,
            function ($app) {
                return new \Src\Projects\Application\Handlers\ListProjectsByEmployeeQueryHandler();
            }
        );

        // Collaboration Handlers
        $this->app->bind(
            \Src\Collaboration\Application\Handlers\CreatePostCommandHandler::class,
            function ($app) {
                return new \Src\Collaboration\Application\Handlers\CreatePostCommandHandler();
            }
        );

        $this->app->bind(
            \Src\Collaboration\Application\Handlers\UpdatePostCommandHandler::class,
            function ($app) {
                return new \Src\Collaboration\Application\Handlers\UpdatePostCommandHandler();
            }
        );

        $this->app->bind(
            \Src\Collaboration\Application\Handlers\DeletePostCommandHandler::class,
            function ($app) {
                return new \Src\Collaboration\Application\Handlers\DeletePostCommandHandler();
            }
        );

        $this->app->bind(
            \Src\Collaboration\Application\Handlers\ReactToPostCommandHandler::class,
            function ($app) {
                return new \Src\Collaboration\Application\Handlers\ReactToPostCommandHandler();
            }
        );

        $this->app->bind(
            \Src\Collaboration\Application\Handlers\CreateCommentCommandHandler::class,
            function ($app) {
                return new \Src\Collaboration\Application\Handlers\CreateCommentCommandHandler();
            }
        );

        $this->app->bind(
            \Src\Collaboration\Application\Handlers\DeleteCommentCommandHandler::class,
            function ($app) {
                return new \Src\Collaboration\Application\Handlers\DeleteCommentCommandHandler();
            }
        );

        $this->app->bind(
            \Src\Collaboration\Application\Handlers\ListPostsQueryHandler::class,
            function ($app) {
                return new \Src\Collaboration\Application\Handlers\ListPostsQueryHandler();
            }
        );

        $this->app->bind(
            \Src\Collaboration\Application\Handlers\GetPostByIdQueryHandler::class,
            function ($app) {
                return new \Src\Collaboration\Application\Handlers\GetPostByIdQueryHandler();
            }
        );

        $this->app->bind(
            \Src\Collaboration\Application\Handlers\ListCommentsQueryHandler::class,
            function ($app) {
                return new \Src\Collaboration\Application\Handlers\ListCommentsQueryHandler();
            }
        );

        // Communication Handlers
        $this->app->bind(
            \Src\Communication\Application\Handlers\CreateChatCommandHandler::class,
            function ($app) {
                return new \Src\Communication\Application\Handlers\CreateChatCommandHandler();
            }
        );

        $this->app->bind(
            \Src\Communication\Application\Handlers\DeleteChatCommandHandler::class,
            function ($app) {
                return new \Src\Communication\Application\Handlers\DeleteChatCommandHandler();
            }
        );

        $this->app->bind(
            \Src\Communication\Application\Handlers\CreateMessageCommandHandler::class,
            function ($app) {
                return new \Src\Communication\Application\Handlers\CreateMessageCommandHandler();
            }
        );

        $this->app->bind(
            \Src\Communication\Application\Handlers\DeleteMessageCommandHandler::class,
            function ($app) {
                return new \Src\Communication\Application\Handlers\DeleteMessageCommandHandler();
            }
        );

        $this->app->bind(
            \Src\Communication\Application\Handlers\ListChatsQueryHandler::class,
            function ($app) {
                return new \Src\Communication\Application\Handlers\ListChatsQueryHandler();
            }
        );

        $this->app->bind(
            \Src\Communication\Application\Handlers\GetChatByIdQueryHandler::class,
            function ($app) {
                return new \Src\Communication\Application\Handlers\GetChatByIdQueryHandler();
            }
        );

        $this->app->bind(
            \Src\Communication\Application\Handlers\ListMessagesQueryHandler::class,
            function ($app) {
                return new \Src\Communication\Application\Handlers\ListMessagesQueryHandler();
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
