<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp\Api\Campaigns;

use Stefna\Mailchimp\Api\Campaigns\Campaigns as CampaignsApi;
use Stefna\Mailchimp\Api\Campaigns\Request\CampaignsAllRequest;
use Stefna\Mailchimp\Model\Campaign\Campaign;
use Stefna\Mailchimp\Model\Campaign\Create\Campaign as CreateCampaign;
use Stefna\Mailchimp\Model\Campaign\Create\CampaignSettings as CreateCampaignSettings;
use Stefna\Mailchimp\Model\Campaign\Update\Campaign as UpdateCampaign;
use Stefna\Mailchimp\Model\Campaign\Update\CampaignSettings as UpdateCampaignSettings;
use Stefna\Mailchimp\Other\AbstractData;
use Tests\Stefna\Mailchimp\Api\CollectionTestCase;

class CampaignsTest extends CollectionTestCase
{
	private const CAMPAIGN_ID_1 = '0cefd1915f';
	private const SUBJECT_DEFAULT = 'TestSubjectLine';
	private const SUBJECT_BAD = 'TestSubjectLineBad';

	/**
	 * @param Campaign $entity
	 */
	protected function checkEntityDefault(mixed $entity): void
	{
		parent::checkEntityDefault($entity);
		$this->assertEquals(self::SUBJECT_DEFAULT, $entity->settings->subjectLine);
	}

	protected function getNewEntity(?string $param1 = null, ?string $param2 = null): CreateCampaign
	{
		if (null === $param1) {
			$param1 = self::SUBJECT_DEFAULT;
		}
		if (null === $param2) {
			$param2 = 'regular';
		}

		$campaign = new CreateCampaign();
		$campaign->type = $param2;
		$campaign->settings = new CreateCampaignSettings();
		$campaign->settings->subjectLine = $param1;
		$campaign->settings->fromName = 'TestFromName';
		$campaign->settings->replyTo = 'testuser@example.com';

		return $campaign;
	}

	protected function getSingleEntityId(): string
	{
		return self::CAMPAIGN_ID_1;
	}

	protected function getApi(): CampaignsApi
	{
		return $this->getClient()->campaigns();
	}

	protected function getAllOneParams(): CampaignsAllRequest
	{
		return new CampaignsAllRequest();
	}

	protected function getBadCreateParam1(): string
	{
		return self::SUBJECT_BAD;
	}

	protected function getBadCreateParam2(): string
	{
		return 'badType';
	}

	protected function getNotFoundId(): string
	{
		return 'nonExisting';
	}

	protected function getUpdateData(): UpdateCampaign
	{
		$data = new UpdateCampaign();
		$data->settings = new UpdateCampaignSettings();
		$data->settings->subjectLine = 'ChangedSubject';
		return $data;
	}

	protected function getEntityClass(): string
	{
		return Campaign::class;
	}

	protected function getApiClass(): string
	{
		return CampaignsApi::class;
	}

	/**
	 * @param Campaign $entity
	 * @param Campaign $returnEntity
	 */
	protected function checkEntity(AbstractData $entity, AbstractData $returnEntity): void
	{
		$this->assertEquals($entity->type, $returnEntity->type);
		$this->assertEquals($entity->settings->subjectLine, $returnEntity->settings->subjectLine);
	}

	/**
	 * @param Campaign $entity
	 */
	protected function getEntityId(AbstractData $entity): string
	{
		return $entity->id;
	}
}
