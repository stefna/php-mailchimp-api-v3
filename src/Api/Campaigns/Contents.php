<?php

namespace Stefna\Mailchimp\Api\Campaigns;

use Stefna\Mailchimp\Api\RestApi;
use Stefna\Mailchimp\Client;
use Stefna\Mailchimp\Model\Campaign\Content;
use Stefna\Mailchimp\Model\Campaign\Content\CampaignContent;
use Stefna\Mailchimp\Other\AbstractData;
use Stefna\Mailchimp\Other\AbstractRequest;

class Contents extends RestApi
{
	protected Campaigns $campaigns;
	protected string $campaignId;

	public function __construct(Client $client, Campaigns $campaigns, string $campaignId)
	{
		parent::__construct($client);
		$this->campaigns = $campaigns;
		$this->campaignId = $campaignId;
	}

	public function getMethodUrl(): string
	{
		return $this->campaigns->getMethodUrl() . '/' . $this->campaignId . '/content';
	}

	/**
	 * @param AbstractRequest|null $params
	 * @return AbstractData|Content|null
	 */
	public function get(?AbstractRequest $params = null)
	{
		return $this->fetchOne(Content::class, null, $params);
	}

	/**
	 * @param CampaignContent $params
	 * @return Content
	 */
	public function update(CampaignContent $params): Content
	{
		$data = $params->getData();
		$path = $this->getPath(self::ACTION_UPDATE);
		$retData = $this->client->put($path, $data);
		return new Content($retData);
	}
}
