<?php

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Model\Campaign\Content\Item;
use Stefna\Mailchimp\Other\AbstractData;

class Content extends AbstractData
{
	/**
	 * The Archive HTML for the campaign.
	 * Example: <!DOCTYPE html><html xmlns=http://www.w3.org/1999/xhtml><head><meta http-equiv=Content-Type content="text/html; charset=UTF-8"><title>My Subject</title><style type=text/css>body{background-color:#d0e4fe}</style><body leftmargin=0 marginwidth=0 topmargin=0 marginheight=0 offset=0>.
	 *
	 * @var string
	 */
	public $archiveHtml;

	/**
	 * The raw HTML for the campaign.
	 *
	 * @var string
	 */
	public $html;

	/**
	 * The plain-text portion of the campaign. If left unspecified, we'll generate this automatically.
	 *
	 * @var string
	 */
	public $plainText;

	/**
	 * Content options for multivariate campaigns.
	 *
	 * @var Item[]
	 */
	public $variateContents;

}
