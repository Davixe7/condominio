<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\USDService;

class USDServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(USDService::class, function($app){
            return new USDService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
