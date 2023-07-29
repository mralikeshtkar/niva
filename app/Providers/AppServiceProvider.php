<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Validator;



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
        dd(base_path(''));
        Schema::defaultStringLength(191);
        $this->app->bind('path.public', function() {
            dd(__DIR__);
            return base_path().'/public_html';
        });
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
