<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Settings;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        if (Schema::hasTable('settings')) :
            if (!Cache::has('Setting')):
                $Setting = Settings::first();
                Cache::put('Setting', $Setting);
            endif;
            view()->share('Setting', Cache::get('Setting'));
        endif;
    }
}
