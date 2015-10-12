<?php

namespace Casinelli\CampaignMonitor;

class CampaignMonitor
{
    protected $app;

    protected $csRestSubscribers = null;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function subscribers($listId)
    {
        return $this->getCsRestSubscribers($listId);
    }

    protected function getCsRestSubscribers($listId)
    {
        if ($this->csRestSubscribers) {
            return $this->csRestSubscribers;
        }

        return $this->csRestSubscribers = new \CS_REST_Subscribers($listId, $this->getAuthTokens());
    }

    protected function getAuthTokens()
    {
        return [
            'access_token' => $this->app['config']['campaignmonitor.api_key'],
        ];
    }
}
