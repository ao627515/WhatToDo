<?php

namespace App\Providers;

use App\Interfaces\Repositories\AuthRepositoryInterface;
use App\Interfaces\Repositories\ToDoRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Repositories\AuthRepository;
use App\Repositories\ToDoRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryAppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->bind(ToDoRepositoryInterface::class, ToDoRepository::class);
        app()->bind(AuthRepositoryInterface::class, AuthRepository::class);
        app()->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
