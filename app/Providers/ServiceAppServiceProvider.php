<?php

namespace App\Providers;

use App\Interfaces\Services\AuthServiceInterface;
use App\Interfaces\Services\CategoryServiceInterface;
use App\Interfaces\Services\ToDoServiceInterface;
use App\Interfaces\Services\UserServiceInterface;
use App\Services\AuthService;
use App\Services\CategorySerivce;
use App\Services\ToDoService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class ServiceAppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->bind(ToDoServiceInterface::class, ToDoService::class);
        app()->bind(AuthServiceInterface::class, AuthService::class);
        app()->bind(UserServiceInterface::class, UserService::class);
        app()->bind(CategoryServiceInterface::class, CategorySerivce::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}