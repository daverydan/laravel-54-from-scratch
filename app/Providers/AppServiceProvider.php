<?php

namespace App\Providers;

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
        // View::composer() or
        // with a view composer you can hook into a view anytime a view is loaded
        // almost like a callback
        // when 'layouts.sidebar' is loaded, register/run this callback
        // which binds the archives => App\Post::archives() to the view
        // hook into 'layouts.sidebar', pass in the view & bind 'archives' to the $view
        view()->composer('layouts.sidebar', function($view) {
			$view->with('archives', \App\Post::archives());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
