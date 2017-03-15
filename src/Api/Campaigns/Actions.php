<?php

namespace Stefna\Mailchimp\Api\Campaigns;

use Stefna\Mailchimp\Api\RestApi;
use Stefna\Mailchimp\Client;
use Stefna\Mailchimp\Model\Campaign\SendTest;

class Actions extends RestApi
{
	const ACTION_TEST = 'test';
	const ACTION_SEND = 'send';

	protected $actions = [
		self::ACTION_TEST => 'test',
		self::ACTION_SEND => 'send',
	];

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
		return $this->campaigns->getMethodUrl() . '/' . $this->campaignId . '/actions';
	}

	/**
	 * @param SendTest $data
	 * @return bool
	 */
	public function test($data)
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
	public function send()
	{
		$retData = $this->client->post($this->getPath(self::ACTION_SEND));
		if (!$retData) {
			return true;
		}
		return false;
	}
}
