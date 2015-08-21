<?php

namespace App\Providers;

use App\Helpers\ConfigWriter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register('Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider');
            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
        }

        if (starts_with(\Request::getRequestUri(), "/admin/"))
            $this->app->singleton('ConfigWriter', function($app)
            {
                return new ConfigWriter();
            });
    }
}
