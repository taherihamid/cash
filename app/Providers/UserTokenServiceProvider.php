<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class UserTokenServiceProvider extends ServiceProvider
{
    public function register()
    {
        App::bind('Token', function() {
            return new \App\Classes\Token();
        });
    }
}
