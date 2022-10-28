<?php
declare(strict_types=1);

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
	public function all($params = null): array
	{
		return $this->fetchAll(Campaign::class, 'campaigns', $params);
	}

	/**
	 * @param string $id
	 * @param AbstractRequest|null $params
	 * @return Campaign|AbstractData|null
	 */
	public function get(string $id, ?AbstractRequest $params = null): ?Campaign
	{
		return $this->fetchOne(Campaign::class, $id, $params);
	}

	/**
	 * @param CreateCampaign|AbstractData $data
	 */
	public function create(AbstractData $data): Campaign
	{
		return $this->doCreate($data, Campaign::class);
	}

	/**
	 * @param string $id
	 * @param array<string, AbstractData>|AbstractData|UpdateCampaign $data
	 */
	public function update(string $id, $data): Campaign
	{
		return $this->doUpdate($id, $data, Campaign::class);
	}

	public function delete(string $id): bool
	{
		return (bool)$this->doDelete($id);
	}

	public function contents(string $campaignId): Contents
	{
		return new Contents($this->client, $this, $campaignId);
	}

	public function actions(string $campaignId): Actions
	{
		return new Actions($this->client, $this, $campaignId);
	}

	public function checklist(string $campaignId, ?CampaignsRequest $params = null): ?SendChecklist
	{
		$path = $this->getPath(self::ACTION_ONE, [$campaignId, 'send-checklist']);
		$data = $this->fetch($path, null, $params);
		if (!$data) {
			return null;
		}
		return new SendChecklist($data);
	}
}
