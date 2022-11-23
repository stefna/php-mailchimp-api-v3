<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\SubscriberList\ListMembers;

use Stefna\Mailchimp\Other\AbstractData;

class SubscriberStats extends AbstractData
{
	/**
	 * A subscriber's average click-through rate.
	 */
	public float $avgClickRate;
	/**
	 * A subscriber's average open rate.
	 */
	public float $avgOpenRate;
}
