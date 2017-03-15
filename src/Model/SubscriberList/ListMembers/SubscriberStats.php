<?php

namespace Stefna\Mailchimp\Model\SubscriberList\ListMembers;

use Stefna\Mailchimp\Other\AbstractData;

class SubscriberStats extends AbstractData
{
	/**
	 * A subscriber's average clickthrough rate.
	 *
	 * @var number
	 */
	public $avgClickRate;

	/**
	 * A subscriber's average open rate.
	 *
	 * @var number
	 */
	public $avgOpenRate;
}
