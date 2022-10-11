<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Content\CampaignContent;

use Stefna\Mailchimp\Other\AbstractData;

class VariateContent extends AbstractData
{
	/**
	 * Available when uploading an archive to create campaign content. The archive should include all campaign content and images. [Learn more](http://kb.mailchimp.com/campaigns/ways-to-build/import-a-zip-file-to-create-a-campaign?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs).
	 *
	 * @var UploadArchive
	 */
	public UploadArchive $archive;

	/**
	 * Use this template to generate the HTML content of the campaign.
	 *
	 * @var TemplateContent
	 */
	public TemplateContent $template;


	/**
	 * The plain-text portion of the campaign. If left unspecified, we'll generate this automatically.
	 *
	 * @var string
	 */
	public string $plainText;


	/**
	 * When importing a campaign, the URL where the HTML lives.
	 *
	 * @var string
	 */
	public string $url;

	/**
	 * The label used to identify the content option.
	 *
	 * @var string
	 */
	public string $contentLabel;

	/**
	 * The raw HTML for the campaign.
	 *
	 * @var string
	 */
	public string $html;
}