<?php

namespace Stefna\Mailchimp\Api\Lists\Request;

use Stefna\Mailchimp\Api\Request\AllInterface;
use Stefna\Mailchimp\Api\Request\AllTrait;

class ListsMembersAllRequest extends ListsRequest implements AllInterface
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

	public function setEmailType($value)
	{
		$this->data['email_type'] = (string)$value;
		return $this;
	}

	public function setStatus($value)
	{
		$this->data['status'] = (string)$value;
		return $this;
	}

	public function setSinceTimestampOpt($value)
	{
		if ($value instanceof \DateTime) {
			$value = $value->format(\DateTime::W3C);
		}
		$this->data['since_timestamp_opt'] = (string)$value;
		return $this;
	}

	public function setBeforeTimestampOpt($value)
	{
		if ($value instanceof \DateTime) {
			$value = $value->format(\DateTime::W3C);
		}
		$this->data['before_timestamp_opt'] = (string)$value;
		return $this;
	}

	public function setSinceLastChanged($value)
	{
		if ($value instanceof \DateTime) {
			$value = $value->format(\DateTime::W3C);
		}
		$this->data['since_last_changed'] = (string)$value;
		return $this;
	}

	public function setBeforeLastChanged($value)
	{
		if ($value instanceof \DateTime) {
			$value = $value->format(\DateTime::W3C);
		}
		$this->data['before_last_changed'] = (string)$value;
		return $this;
	}

	public function setUniqueEmailId($value)
	{
		$this->data['unique_email_id'] = (string)$value;
		return $this;
	}

	public function setVipOnly($value)
	{
		$this->data['vip_only'] = (bool)$value;
		return $this;
	}

	public function setInterestCategoryId($value)
	{
		$this->data['interest_category_id'] = (string)$value;
		return $this;
	}

	public function setInterestIds($value)
	{
		if (is_array($value)) {
			$value = implode(',', $value);
		}
		$this->data['interest_ids'] = (string)$value;
		return $this;
	}

	public function setInterestMatch($value)
	{
		$default = 'all';
		$possible = ['all', 'any', 'none'];
		if (!in_array($value, $possible)) {
			$value = $default;
		}
		$this->data['interest_match'] = (string)$value;
		return $this;
	}

}
