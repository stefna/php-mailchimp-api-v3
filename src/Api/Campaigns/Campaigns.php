<?php

namespace Stefna\Mailchimp\Api\Campaigns;

use Stefna\Mailchimp\Api\Campaigns\Request\CampaignsAllRequest;
use Stefna\Mailchimp\Api\Campaigns\Request\CampaignsRequest;
use Stefna\Mailchimp\Api\CollectionRestApi;
use Stefna\Mailchimp\Model\Campaign\Campaign;
use Stefna\Mailchimp\Model\Campaign\Create\Campaign as CreateCampaign;
use Stefna\Mailchimp\Model\Campaign\SendChecklist;
use Stefna\Mailchimp\Model\Campaign\Update\Campaign as UpdateCampaign;
use Stefna\Mailchimp\Other\AbstractData;
use Stefna\Mailchimp\Other\AbstractRequest;

class Campaigns extends CollectionRestApi
{
	public function getMethodUrl(): string
	{
		return 'campaigns';
	}

	/**
	 * @param CampaignsAllRequest|AbstractRequest|null $params
	 * @return Campaign[]
	 */
	public function all($params = null)
	{
		return $this->fetchAll(Campaign::class, 'campaigns', $params);
	}

	/**
	 * @param string $id
	 * @param Campaigns|null $params
	 * @return Campaign
	 */
	public function get($id, $params = null)
	{
		return $this->fetchOne(Campaign::class, $id, $params);
	}

	/**
	 * @param CreateCampaign|AbstractData $campaign
	 * @return Campaign
	 */
	public function create($campaign)
	{
		return $this->doCreate($campaign, Campaign::class);
	}

	/**
	 * @param string $id
	 * @param UpdateCampaign|AbstractData $campaign
	 * @return Campaign
	 */
	public function update(string $id, $campaign)
	{
		return $this->doUpdate($id, $campaign, Campaign::class);
	}

	/**
	 * @param string $id
	 * @return bool
	 */
	public function delete(string $id)
	{
		return $this->doDelete($id);
	}

	public function contents(string $campaignId): Contents
	{
		return new Contents($this->client, $this, $campaignId);
	}

	public function actions(string $campaignId): Actions
	{
		return new Actions($this->client, $this, $campaignId);
	}

	/**
	 * @param string $campaignId
	 * @param CampaignsRequest $params
	 * @return SendChecklist|null
	 */
	public function checklist($campaignId, $params = null)
	{
		$path = $this->getPath(self::ACTION_ONE, [$campaignId, 'send-checklist']);
		$data = $this->fetch($path, null, $params);
		if (!$data) {
			return null;
		}
		return new SendChecklist($data);
	}
}
