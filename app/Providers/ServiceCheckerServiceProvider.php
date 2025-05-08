<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\ServiceChecker;
use App\Services\GithubServiceChecker;
use App\Services\HttpServiceChecker;

class ServiceCheckerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(HttpServiceChecker::class);
        $this->app->singleton(GithubServiceChecker::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
