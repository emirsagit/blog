<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Models\Article::creating(function($article){
            $article->slug=Str::slug($article->title);
        });
        //pagination view
        Paginator::defaultView('vendor/pagination/bulma');
        Paginator::defaultSimpleView('vendor/pagination/bulma');
    }
}
