<?php

namespace Lynrantictz\LaravelOrganization;

use Illuminate\Support\ServiceProvider;
use Lynrantictz\LaravelOrganization\Commands\GenCommand;
use Lynrantictz\LaravelOrganization\Commands\InitCommand;

class LaravelOrganizationServiceProvider extends ServiceProvider
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
        if ($this->app->runningInConsole()) {
            $this->commands([
                InitCommand::class,
                GenCommand::class
            ]);
        }
    }
}
