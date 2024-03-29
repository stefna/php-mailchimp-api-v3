<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Content;

use Stefna\Mailchimp\Other\AbstractData;

class Item extends AbstractData
{
	/**
	 * Label used to identify the content option.
	 * Example: Green header
	 */
	public string $contentLabel;
	/**
	 * The plain-text portion of the campaign. If left unspecified, we'll generate this automatically.
	 * Example: Freddie likes jokes. Go to http://freddiesjokes.com to see all his jokes.
	 */
	public string $plainText;
	/**
	 * The raw HTML for the campaign.
	 * Example: <!DOCTYPE html><html xmlns=http://www.w3.org/1999/xhtml><head><meta http-equiv=Content-Type content=\"text/html; charset=UTF-8\"><title>*|MC:SUBJECT|*</title><style type=text/css>body{background-color:#d0e4fe}</style><body leftmargin=0 marginwidth=0 topmargin=0 marginheight=0 offset=0>
	 */
	public string $html;
}
