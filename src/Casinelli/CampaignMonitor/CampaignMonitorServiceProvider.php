<?php

namespace Casinelli\CampaignMonitor;

use Illuminate\Support\ServiceProvider;

class CampaignMonitorServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/campaignmonitor.php' => config_path('campaignmonitor.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/campaignmonitor.php', 'campaignmonitor');

        $this->app->singleton('campaignmonitor', function ($app) {
            return new CampaignMonitor($app);
        });
    }

    public function provides()
    {
        return ['campaignmonitor'];
    }
}
