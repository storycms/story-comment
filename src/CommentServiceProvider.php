<?php

namespace Plugins\Story\Comment;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        Route::middleware('web')
            ->namespace('Plugins\\Story\\Comment\\Http')
            ->group(__DIR__.'/../routes.php');
    }

    public function register()
    {
        $this->app->singleton(CommentManager::class);
    }
}
