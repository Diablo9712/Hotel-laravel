<?php

namespace App\Providers;

use ConsoleTVs\Charts\Registrar as Charts;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        $charts->register([
            \App\Charts\SampleChart::class
        ]);

        Schema::defaultStringLength(255);
    }

    
}
