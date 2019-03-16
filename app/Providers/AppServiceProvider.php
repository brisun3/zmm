<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \App::singleton('App\Billing\Stripe', function(){
            return new \App\Billing\Stripe(config('services.stripe.secret'));
          });
          //$stripe=App::make('App\Billing\Stripe');
    }
}
