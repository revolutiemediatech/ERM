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
        view()->share('admin', 'admin/layout/main');
        view()->share('adminRs', 'adminRs/layout/main');
        view()->share('dokter', 'dokter/layout/main');
        view()->share('apoteker', 'apoteker/layout/main');
        view()->share('analisLabor', 'analisLabor/layout/main');
        view()->share('paramedis', 'paramedis/layout/main');
        view()->share('bidan', 'bidan/layout/main');
        view()->share('perawat', 'perawat/layout/main');
    }
}
