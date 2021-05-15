<?php

namespace App\Providers;

use App\Models\Voucher;
use App\Observers\VoucherObserver;
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
        Voucher::observe(VoucherObserver::class);
    }
}
