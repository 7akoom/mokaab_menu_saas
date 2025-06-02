<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $currentGuard = null;
            if (Auth::guard('company')->check()) {
                $currentGuard = 'company';
            } elseif (Auth::guard('web')->check()) {
                $currentGuard = 'web';
            }
            $view->with('currentGuard', $currentGuard);
        });
    }
}
