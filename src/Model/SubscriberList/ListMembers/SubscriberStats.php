<?php

namespace Stefna\Mailchimp\Model\SubscriberList\ListMembers;

use Stefna\Mailchimp\Other\AbstractData;

class SubscriberStats extends AbstractData
{
	/**
	 * A subscriber's average click-through rate.
	 *
	 * @var float
	 */
	public float $avgClickRate;

	/**
	 * A subscriber's average open rate.
	 *
	 * @var float
	 */
	public float $avgOpenRate;
}
