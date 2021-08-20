<?php

namespace App\Providers;

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
        if(config('app.env') == 'production'){

            \URL::forceScheme('https');
        }
    }
}
postgres://qvstlvttlsjkzu:a742b6896c749fbaa6ba937d71440d911999d9fe0b0dbcbf1e3a6bc236c96892@ec2-18-214-238-28.compute-1.amazonaws.com:5432/d3pr0s0a57ijvi
