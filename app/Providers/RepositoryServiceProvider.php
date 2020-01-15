<?php

namespace App\Providers;

use App\Repositories\ApprovalRepository;
use App\Repositories\Interfaces\ApprovalRepositoryInterface;
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
            ApprovalRepositoryInterface::class,
            ApprovalRepository::class
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
