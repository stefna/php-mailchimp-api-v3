<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Content;

use Stefna\Mailchimp\Model\Campaign\Content\CampaignContent\TemplateContent;
use Stefna\Mailchimp\Model\Campaign\Content\CampaignContent\UploadArchive;
use Stefna\Mailchimp\Model\Campaign\Content\CampaignContent\VariateContent;
use Stefna\Mailchimp\Other\AbstractData;

class CampaignContent extends AbstractData
{
	/**
	 * Available when uploading an archive to create campaign content. The archive should include all campaign content and images. [Learn more](http://kb.mailchimp.com/campaigns/ways-to-build/import-a-zip-file-to-create-a-campaign?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs).
	 */
	public UploadArchive $archive;
	/**
	 * The raw HTML for the campaign.
	 */
	public string $html;
	/**
	 * The plain-text portion of the campaign. If left unspecified, we'll generate this automatically.
	 */
	public string $plainText;
	/**
	 * Use this template to generate the HTML content of the campaign.
	 */
	public TemplateContent $template;
	/**
	 * When importing a campaign, the URL where the HTML lives.
	 */
	public string $url;
	/**
	 * Content options for [Multivariate Campaigns](http://kb.mailchimp.com/campaigns/multivariate/about-multivariate-campaigns?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs). Each content option must provide HTML content and may optionally provide plain text. For campaigns not testing content, only one object should be provided.
	 *
	 * @var VariateContent[]
	 */
	public array $variateContents;
	protected array $classMap = [
		'template' => TemplateContent::class,
		'archive' => UploadArchive::class,
		'variateContents' => VariateContent::class,
	];
}
