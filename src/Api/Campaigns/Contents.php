<?php

namespace Stefna\Mailchimp\Api\Campaigns;

use Stefna\Mailchimp\Api\RestApi;
use Stefna\Mailchimp\Client;
use Stefna\Mailchimp\Model\Campaign\Content;
use Stefna\Mailchimp\Model\Campaign\Content\CampaignContent;

class Contents extends RestApi
{
	/** @var Campaigns */
	protected $campaigns;

	/** @var string */
	protected $campaignId;

	public function __construct(Client $client, Campaigns $campaigns, $campaignId)
	{
		parent::__construct($client);
		$this->campaigns = $campaigns;
		$this->campaignId = $campaignId;
	}

	/**
	 * @return string
	 */
	public function getMethodUrl()
	{
		return $this->campaigns->getMethodUrl() . '/' . $this->campaignId . '/content';
	}

	/**
	 * @param \Stefna\Mailchimp\Other\AbstractRequest|null $params
	 * @return Content
	 */
	public function get($params = null)
	{
		return $this->fetchOne(Content::class, null, $params);
	}

	/**
	 * @param CampaignContent $params
	 * @return Content
	 */
	public function update($params)
	{
		$data = $params->getData();
		$path = $this->getPath(self::ACTION_UPDATE);
		$retData = $this->client->put($path, $data);
		return new Content($retData);
	}
}
