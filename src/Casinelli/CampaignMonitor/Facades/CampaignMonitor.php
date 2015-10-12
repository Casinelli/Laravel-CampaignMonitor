<?php

namespace Casinelli\CampaignMonitor\Facades;

use Illuminate\Support\Facades\Facade;

class CampaignMonitor extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'campaignmonitor';
    }
}
