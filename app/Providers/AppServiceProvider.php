<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        \Carbon\Carbon::setLocale('id');

        // Konfigurasi sekolah dibagikan ke semua view sebagai $site (cukup 1 query per request)
        View::composer(['frontend.*', 'backend.*'], function ($view) {
            static $site = null;
            if ($site === null) {
                $site = \App\Aplikasi::first() ?? new \App\Aplikasi();
            }
            $view->with('site', $site);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
