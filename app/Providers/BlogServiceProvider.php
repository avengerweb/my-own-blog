<?php

namespace App\Providers;

use App\Services\Blog\PostsService;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
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
     * Register blog services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PostsService::class, PostsService::class);
    }
}
