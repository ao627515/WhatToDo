<?php

namespace App\Providers;

use App\Interfaces\Services\AuthServiceInterface;
use App\Interfaces\Services\ToDoServiceInterface;
use App\Services\AuthService;
use App\Services\ToDoService;
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
