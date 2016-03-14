<?php

namespace Casinelli\CampaignMonitor;

class CampaignMonitor
{
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function campaigns($campaignId = null)
    {
        return new \CS_REST_Campaigns($campaignId, $this->getAuthTokens());
    }

    public function clients($clientId = null)
    {
        return new \CS_REST_Clients($clientId, $this->getAuthTokens());
    }

    public function lists($listId = null)
    {
        return new \CS_REST_Lists($listId, $this->getAuthTokens());
    }

    public function segments($segmentId = null)
    {
        return new \CS_REST_Segments($segmentId, $this->getAuthTokens());
    }

    public function template($templateId = null)
    {
        return new \CS_REST_Templates($templateId, $this->getAuthTokens());
    }

    public function subscribers($listId = null)
    {
        return new \CS_REST_Subscribers($listId, $this->getAuthTokens());
    }

    public function classicSend($clientId = null)
    {
        return new \CS_REST_Transactional_ClassicEmail($this->getAuthTokens(), $clientId);
    }

    protected function getAuthTokens()
    {
        return [
            'api_key' => $this->app['config']['campaignmonitor.api_key'],
        ];
    }
}
