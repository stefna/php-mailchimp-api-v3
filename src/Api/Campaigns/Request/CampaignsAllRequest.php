<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Api\Campaigns\Request;

use Stefna\Mailchimp\Api\Request\AllInterface;
use Stefna\Mailchimp\Api\Request\AllTrait;

class CampaignsAllRequest extends CampaignsRequest implements AllInterface
{
	use AllTrait;

	const PARAM_TYPE = 'type';
	const PARAM_STATUS = 'status';
	const PARAM_SINCE_SEND_TIME = 'since_send_time';
	const PARAM_BEFORE_SEND_TIME = 'before_send_time';
	const PARAM_SINCE_CREATE_TIME = 'since_create_time';
	const PARAM_BEFORE_CREATE_TIME = 'before_create_time';
	const PARAM_LIST_ID = 'list_id';
	const PARAM_SORT_FIELD = 'sort_field';
	const PARAM_SORT_DIR = 'sort_dir';


	public function setType(string $value): CampaignsAllRequest
	{
		$this->data[self::PARAM_TYPE] = $value;
		return $this;
	}

	public function setStatus(string $value): CampaignsAllRequest
	{
		$this->data[self::PARAM_STATUS] = $value;
		return $this;
	}

	public function setSinceSendTime(string $value): CampaignsAllRequest
	{
		$this->data[self::PARAM_SINCE_SEND_TIME] = $value;
		return $this;
	}

	public function setBeforeSendTime(string $value): CampaignsAllRequest
	{
		$this->data[self::PARAM_BEFORE_SEND_TIME] = $value;
		return $this;
	}

	public function setSinceCreateTime(string $value): CampaignsAllRequest
	{
		$this->data[self::PARAM_SINCE_CREATE_TIME] = $value;
		return $this;
	}

	public function setBeforeCreateTime(string $value): CampaignsAllRequest
	{
		$this->data[self::PARAM_BEFORE_CREATE_TIME] = $value;
		return $this;
	}

	public function setListId(string $value): CampaignsAllRequest
	{
		$this->data[self::PARAM_LIST_ID] = $value;
		return $this;
	}

	public function setSortField(string $value): CampaignsAllRequest
	{
		$this->data[self::PARAM_SORT_FIELD] = $value;
		return $this;
	}

	public function setSortDir(string $value): CampaignsAllRequest
	{
		$this->data[self::PARAM_SORT_DIR] = $value;
		return $this;
	}

}
