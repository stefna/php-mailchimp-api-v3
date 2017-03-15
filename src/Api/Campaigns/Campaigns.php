<?php

namespace Stefna\Mailchimp\Api\Campaigns;

use Stefna\Mailchimp\Api\Campaigns\Request\CampaignsAllRequest;
use Stefna\Mailchimp\Api\Campaigns\Request\CampaignsRequest;
use Stefna\Mailchimp\Api\CollectionRestApi;
use Stefna\Mailchimp\Model\Campaign\Campaign;
use Stefna\Mailchimp\Model\Campaign\Create\Campaign as CreateCampaign;
use Stefna\Mailchimp\Model\Campaign\SendChecklist;
use Stefna\Mailchimp\Model\Campaign\Update\Campaign as UpdateCampaign;

class Campaigns extends CollectionRestApi
{
	/**
	 * @return string
	 */
	public function getMethodUrl()
	{
		return 'campaigns';
	}

	/**
	 * @param CampaignsAllRequest|null $params
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
	 * @param CreateCampaign $campaign
	 * @return Campaign
	 */
	public function create($campaign)
	{
		return $this->doCreate($campaign, Campaign::class);
	}

	/**
	 * @param string $id
	 * @param UpdateCampaign $campaign
	 * @return Campaign
	 */
	public function update($id, $campaign)
	{
		return $this->doUpdate($id, $campaign, Campaign::class);
	}

	/**
	 * @param string $id
	 * @return bool
	 */
	public function delete($id)
	{
		return $this->doDelete($id);
	}

	public function contents($campaignId)
	{
		return new Contents($this->client, $this, $campaignId);
	}

	public function actions($campaignId)
	{
		return new Actions($this->client, $this, $campaignId);
	}

	/**
	 * @param string $campaignId
	 * @param CampaignsRequest $params
	 * @return SendChecklist
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
