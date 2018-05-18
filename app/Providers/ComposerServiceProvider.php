<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider{

    /*BOOT FUNCTION*/
    public function boot()
    {
        view()->composer('Frontend::layouts.header','App\ViewComposers\MenuComposer');
    }

    /*REGISTER FUNCTION*/
    public function register()
    {
        // TODO: Implement register() method.
    }

}