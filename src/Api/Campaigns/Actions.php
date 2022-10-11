<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Api\Campaigns;

use Stefna\Mailchimp\Api\RestApi;
use Stefna\Mailchimp\Client;
use Stefna\Mailchimp\Model\Campaign\SendTest;

class Actions extends RestApi
{
	const ACTION_TEST = 'test';
	const ACTION_SEND = 'send';

	protected array $actions = [
		self::ACTION_TEST => 'test',
		self::ACTION_SEND => 'send',
	];

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
		return $this->campaigns->getMethodUrl() . '/' . $this->campaignId . '/actions';
	}

	/**
	 * @param SendTest $data
	 * @return bool
	 */
	public function test(SendTest $data): bool
	{
		$retData = $this->client->post($this->getPath(self::ACTION_TEST), $data->getData());
		if (!$retData) {
			return true;
		}
		return false;
	}

	/**
	 * @return bool
	 */
	public function send(): bool
	{
		$retData = $this->client->post($this->getPath(self::ACTION_SEND));
		if (!$retData) {
			return true;
		}
		return false;
	}
}
