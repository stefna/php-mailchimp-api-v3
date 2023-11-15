<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Api\Lists\Request;

use DateTimeInterface;
use Stefna\Mailchimp\Api\Request\AllInterface;
use Stefna\Mailchimp\Api\Request\AllTrait;

class ListsAllRequest extends ListsRequest implements AllInterface
{
	use AllTrait;

	private const PARAM_EMAIL = 'email';
	private const PARAM_SINCE_CAMPAIGN_LAST_SENT = 'since_campaign_last_sent';
	private const PARAM_BEFORE_CAMPAIGN_LAST_SENT = 'before_campaign_last_sent';
	private const PARAM_SINCE_DATE_CREATED = 'since_date_created';
	private const PARAM_BEFORE_DATE_CREATED = 'before_date_created';

	public function setBeforeDateCreated(DateTimeInterface|string $value): ListsAllRequest
	{
		if ($value instanceof DateTimeInterface) {
			$value = $value->format(DateTimeInterface::W3C);
		}
		$this->data[self::PARAM_BEFORE_DATE_CREATED] = (string)$value;
		return $this;
	}

	public function setSinceDateCreated(DateTimeInterface|string $value): ListsAllRequest
	{
		if ($value instanceof DateTimeInterface) {
			$value = $value->format(DateTimeInterface::W3C);
		}
		$this->data[self::PARAM_SINCE_DATE_CREATED] = (string)$value;
		return $this;
	}

	public function setBeforeCampaignLastSend(string $value): ListsAllRequest
	{
		$this->data[self::PARAM_BEFORE_CAMPAIGN_LAST_SENT] = $value;
		return $this;
	}

	public function setSinceCampaignLastSend(string $value): ListsAllRequest
	{
		$this->data[self::PARAM_SINCE_CAMPAIGN_LAST_SENT] = $value;
		return $this;
	}

	public function setEmail(string $value): ListsAllRequest
	{
		$this->data[self::PARAM_EMAIL] = $value;
		return $this;
	}
}
