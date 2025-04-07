<?php

namespace App\Providers;

use App\Interfaces\Services\ToDoServiceInterface;
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
