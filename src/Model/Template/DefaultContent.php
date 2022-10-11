<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Template;

use Stefna\Mailchimp\Other\AbstractData;

class DefaultContent extends AbstractData
{
	/**
	 * @var string[]
	 */
	public array $sections;
}
