<?php

namespace App\Providers;

use Braintree\Gateway;
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
        $this->app->singleton(Gateway::class,function($app){
            return new Gateway(
                [
                'environment' => 'sandbox',
                'merchantId' => 'fcbw9x3mcdzygrq8',
                'publicKey' => '72fcdj54gy993fj5',
                'privateKey' => 'f467eddafc980ffe5a8fa9c183f34d3f'
                ]
            );
        });
    }
}
