<?php

namespace App\Providers;

use App\Repositories\ClientRepository;
use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Repositories\Contracts\OfferRepositoryInterface;
use App\Repositories\Contracts\VoucherRepositoryInterface;
use App\Repositories\OfferRepository;
use App\Repositories\VoucherRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            VoucherRepositoryInterface::class,
            VoucherRepository::class
        );

        $this->app->bind(
            OfferRepositoryInterface::class,
            OfferRepository::class
        );

        $this->app->bind(
            ClientRepositoryInterface::class,
            ClientRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
