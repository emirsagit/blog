<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\TagComposer;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\SettingComposer;
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
        $this->app->singleton(SettingComposer::class);
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
        View::composer('*', SettingComposer::class);
        View::composer('*', TagComposer::class);
    }
}
