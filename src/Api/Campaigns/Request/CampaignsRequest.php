<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Api\Campaigns\Request;

use Stefna\Mailchimp\Other\AbstractRequest;

class CampaignsRequest extends AbstractRequest
{
	protected const PARAM_FIELDS = 'fields';
	protected const PARAM_EXCLUDE_FIELDS = 'exclude_fields';

	/**
	 * @param string[] $value
	 * @return $this
	 */
	public function setFields(array $value): CampaignsRequest
	{
		$this->data[self::PARAM_FIELDS] = $value;
		return $this;
	}

	/**
	 * @param string[] $value
	 * @return $this
	 */
	public function setExcludedFields(array $value): CampaignsRequest
	{
		$this->data[self::PARAM_EXCLUDE_FIELDS] = $value;
		return $this;
	}
}
