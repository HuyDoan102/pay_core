<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\Contracts\UserRepository::class, \App\Repositories\Eloquents\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\WalletRepository::class, \App\Repositories\Eloquents\WalletRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\StatementRepository::class, \App\Repositories\Eloquents\StatementRepositoryEloquent::class);
        //:end-bindings:
    }
}
