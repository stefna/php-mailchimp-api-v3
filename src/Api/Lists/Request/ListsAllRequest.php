<?php

namespace Stefna\Mailchimp\Api\Lists\Request;

use Stefna\Mailchimp\Api\Request\AllInterface;
use Stefna\Mailchimp\Api\Request\AllTrait;

class ListsAllRequest extends ListsRequest implements AllInterface
{
	use AllTrait;

	const PARAM_EMAIL = 'email';
	const PARAM_SINCE_CAMPAIGN_LAST_SENT = 'since_campaign_last_sent';
	const PARAM_BEFORE_CAMPAIGN_LAST_SENT = 'before_campaign_last_sent';
	const PARAM_SINCE_DATE_CREATED = 'since_date_created';
	const PARAM_BEFORE_DATE_CREATED = 'before_date_created';

	/**
	 * @param \DateTime|string $value
	 * @return $this
	 */
	public function setBeforeDateCreated($value)
	{
		if ($value instanceof \DateTime) {
			$value = $value->format(\DateTime::W3C);
		}
		$this->data[self::PARAM_BEFORE_DATE_CREATED] = (string)$value;
		return $this;
	}

	/**
	 * @param \DateTime|string $value
	 * @return $this
	 */
	public function setSinceDateCreated($value)
	{
		if ($value instanceof \DateTime) {
			$value = $value->format(\DateTime::W3C);
		}
		$this->data[self::PARAM_SINCE_DATE_CREATED] = (string)$value;
		return $this;
	}

	public function setBeforeCampaignLastSend($value)
	{
		$this->data[self::PARAM_BEFORE_CAMPAIGN_LAST_SENT] = (string)$value;
		return $this;
	}

	public function setSinceCampaignLastSend($value)
	{
		$this->data[self::PARAM_SINCE_CAMPAIGN_LAST_SENT] = (string)$value;
		return $this;
	}

	public function setEmail($value)
	{
		$this->data[self::PARAM_EMAIL] = (string)$value;
		return $this;
	}

}
