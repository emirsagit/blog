<?php

namespace App\Providers;

use App\Http\ViewComposers\TagComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\UnreadNotificationComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UnreadNotificationComposer::class);
        $this->app->singleton(TagComposer::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', UnreadNotificationComposer::class);
        View::composer('*', TagComposer::class);
    }
}
