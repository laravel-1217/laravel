<?php

namespace App\Providers;

use App\Implementations\Counter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Schema::defaultStringLength(191);

        View::share('age', '100');

        View::composer(['welcome', 'qaz.asd'], function ($view) {
            $view->with('age', 250);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Counter', function ($app) {
            return new \App\Implementations\Counter();
        });

        $this->app->singleton('Counter', function ($app) {
            return new \App\Implementations\Counter();
        });

        $this->app->bind(
            'App\Interfaces\CounterInterface',
            'App\Implementations\Counter2'
        );
    }
}
