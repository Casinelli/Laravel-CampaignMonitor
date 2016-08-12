<?php

namespace Casinelli\CampaignMonitor;

class CampaignMonitor
{
    protected $app;
    protected $api_key;

    public function __construct($app, $api_key = null)
    {
        $this->app = $app;
	$this->api_key = $api_key;
    }

    public function campaigns($campaignId = null)
    {
        return new \CS_REST_Campaigns($campaignId, $this->getAuthTokens());
    }

    public function clients($clientId = null)
    {
        return new \CS_REST_Clients($clientId, $this->getAuthTokens());
    }
    
    public function people($clientId = null)
    {
        return new \CS_REST_People($clientId, $this->getAuthTokens());
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

    public function smartSend($smartId = null, $clientId = null)
    {
        return new \CS_REST_Transactional_SmartEmail($smartId, $this->getAuthTokens(), $clientId);
    }

    protected function getAuthTokens()
    {
	if($this->api_key != null){
	  return [
	  	'api_key' => $this->api_key
	  ];
	}

        return [
            'api_key' => $this->app['config']['campaignmonitor.api_key'],
        ];
    }
}
