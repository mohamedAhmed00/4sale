<?php

namespace App\Providers;

use App\Factories\Classes\DataProviderFactory;
use App\Factories\Interfaces\IDataProviderFactoryInterface;
use App\Services\Classes\UserService;
use App\Services\Interfaces\IUserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->scoped(IUserServiceInterface::class, UserService::class);
        $this->app->scoped(IDataProviderFactoryInterface::class, DataProviderFactory::class);
    }
}
