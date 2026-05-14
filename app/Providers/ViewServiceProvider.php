<?php

namespace App\Providers;

use App\Http\View\Composers\NotificationComposer;
use App\Http\View\Composers\MenusComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer(
            '*',
            NotificationComposer::class
        );
        view()->composer(
            'frontend.*',
            MenusComposer::class
        );
        
    }
}
