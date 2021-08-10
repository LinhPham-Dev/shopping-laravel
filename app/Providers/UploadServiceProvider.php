<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UploadService;


class UploadServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UploadService::class, function ($app) {
            return new UploadService();
        });
    }
}
