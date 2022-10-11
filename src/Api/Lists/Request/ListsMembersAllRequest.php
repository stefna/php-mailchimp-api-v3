<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Api\Lists\Request;

use DateTime;
use DateTimeInterface;
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
	 * @param DateTime|string $value
	 * @return $this
	 */
	public function setBeforeDateCreated($value): ListsMembersAllRequest
	{
		if ($value instanceof DateTime) {
			$value = $value->format(DateTimeInterface::W3C);
		}
		$this->data[self::PARAM_BEFORE_DATE_CREATED] = (string)$value;
		return $this;
	}


	public function setEmailType(string $value): ListsMembersAllRequest
	{
		$this->data['email_type'] = $value;
		return $this;
	}

	public function setStatus(string $value): ListsMembersAllRequest
	{
		$this->data['status'] = $value;
		return $this;
	}

	/**
	 * @param DateTime|string $value
	 * @return $this
	 */
	public function setSinceTimestampOpt($value): ListsMembersAllRequest
	{
		if ($value instanceof DateTime) {
			$value = $value->format(DateTimeInterface::W3C);
		}
		$this->data['since_timestamp_opt'] = (string)$value;
		return $this;
	}

	/**
	 * @param DateTime|string $value
	 * @return $this
	 */
	public function setBeforeTimestampOpt($value): ListsMembersAllRequest
	{
		if ($value instanceof DateTime) {
			$value = $value->format(DateTimeInterface::W3C);
		}
		$this->data['before_timestamp_opt'] = (string)$value;
		return $this;
	}

	/**
	 * @param DateTime|string $value
	 * @return $this
	 */
	public function setSinceLastChanged($value): ListsMembersAllRequest
	{
		if ($value instanceof DateTime) {
			$value = $value->format(DateTimeInterface::W3C);
		}
		$this->data['since_last_changed'] = (string)$value;
		return $this;
	}

	/**
	 * @param DateTime|string $value
	 * @return $this
	 */
	public function setBeforeLastChanged($value): ListsMembersAllRequest
	{
		if ($value instanceof DateTime) {
			$value = $value->format(DateTimeInterface::W3C);
		}
		$this->data['before_last_changed'] = (string)$value;
		return $this;
	}

	public function setUniqueEmailId(string $value): ListsMembersAllRequest
	{
		$this->data['unique_email_id'] = $value;
		return $this;
	}

	public function setVipOnly(bool $value): ListsMembersAllRequest
	{
		$this->data['vip_only'] = $value;
		return $this;
	}

	public function setInterestCategoryId(string $value): ListsMembersAllRequest
	{
		$this->data['interest_category_id'] = $value;
		return $this;
	}

	/**
	 * @param string[]|string $value
	 * @return $this
	 */
	public function setInterestIds($value): ListsMembersAllRequest
	{
		if (is_array($value)) {
			$value = implode(',', $value);
		}
		$this->data['interest_ids'] = $value;
		return $this;
	}

	public function setInterestMatch(string $value): ListsMembersAllRequest
	{
		$default = 'all';
		$possible = ['all', 'any', 'none'];
		if (!in_array($value, $possible)) {
			$value = $default;
		}
		$this->data['interest_match'] = $value;
		return $this;
	}

}
