<?php

namespace App\Providers;

use App\Interfaces\Repositories\AuthRepositoryInterface;
use App\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Interfaces\Repositories\PeopleRepositoryInterface;
use App\Interfaces\Repositories\ToDoRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Repositories\AuthRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\PeopleRepository;
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
        app()->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        app()->bind(PeopleRepositoryInterface::class, PeopleRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
