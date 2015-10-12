<?php

namespace Casinelli\CampaignMonitor;

class CampaignMonitor
{
    protected $app;

    protected $csRestSubscibers = null;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function subscribers($listId)
    {
        return $this->getRESTSubscribers($listId);
    }

    protected function getCsRestSubscribers($listId)
    {
        if ($this->csRestSubscribers) {
            return $this->csRestSubscibers;
        }

        return $this->csRestSubscribers = new CS_REST_Subscribers($listId, $this->getAuthTokens());
    }

    protected function getAuthTokens()
    {
        return [
            'access_token' => $this->app['config']['campaignmonitor.api_key'],
        ];
    }
}
