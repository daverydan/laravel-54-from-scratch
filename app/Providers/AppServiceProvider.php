<?php

namespace App\Providers;

use \App\Billing\Stripe;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	// defer it so it's not required on every single page load
	// only loads when requested
	// if you have anything in the boot() you can't defer
	// it needs to be loaded and cached foreach page load
	// protected $defer = true;

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
        $this->app->singleton(Stripe::class, function($app) {
        	// If you need to pass something else in order to resolve, you can
        	// $app->make('');
			return new Stripe(config('services.stripe.secret'));
        });
    }
}
