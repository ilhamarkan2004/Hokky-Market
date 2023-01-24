<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


//  Schema::defaultStringLength(191);
//     \Socialite::extend('google', function($app) {
//         $config = $app['config']['services.google'];
//         return new \Laravel\Socialite\Two\GoogleProvider(
//             $app['request'],
//             new \GuzzleHttp\Client,
//             $config['client_id'],
//             $config['client_secret'],
//             $config['redirect']
//         );
//     });



    }
}
