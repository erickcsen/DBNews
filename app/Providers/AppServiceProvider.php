<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        // if(env('SERVER_STATUS') == 'production') {
        //     URL::forceScheme('https');
        // }
    }
        
}
