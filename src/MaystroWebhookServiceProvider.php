<?php

namespace Moh4git\MaystroWebhook;

use Illuminate\Support\ServiceProvider;

class MaystroWebhookServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                WebhookCommand::class
            ]);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/tenant.php');
    }
}
