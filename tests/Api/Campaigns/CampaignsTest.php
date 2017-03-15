<?php

namespace Tests\Stefna\Mailchimp\Api\Campaigns;

use Stefna\Mailchimp\Model\Campaign\Campaign;
use Stefna\Mailchimp\Model\Campaign\Create\Campaign as CreateCampaign;
use Stefna\Mailchimp\Api\Campaigns\Campaigns as CampaignsApi;
use Stefna\Mailchimp\Api\Campaigns\Request\CampaignsAllRequest;
use Stefna\Mailchimp\Model\Campaign\Create\CampaignSettings as CreateCampaignSettings;
use Stefna\Mailchimp\Model\Campaign\Update\Campaign as UpdateCampaign;
use Stefna\Mailchimp\Model\Campaign\Update\CampaignSettings as UpdateCampaignSettings;
use Stefna\Mailchimp\Other\AbstractData;
use Tests\Stefna\Mailchimp\Api\CollectionTestCase;

class CampaignsTest extends CollectionTestCase
{
	const CAMPAIGN_ID_1 = '0cefd1915f';

	const SUBJECT_DEFAULT = 'TestSubjectLine';
	const SUBJECT_BAD = 'TestSubjectLineBad';


	protected function checkEntityDefault($entity)
	{
		parent::checkEntityDefault($entity);
		$this->assertEquals(self::SUBJECT_DEFAULT, $entity->settings->subjectLine);
	}

	/**
	 * @param string $subject
	 * @param string $type
	 * @return CreateCampaign
	 */
	protected function getNewEntity($subject = null, $type = null)
	{
		if (null === $subject) $subject = self::SUBJECT_DEFAULT;
		if (null === $type) $type = 'regular';

		$campaign = new CreateCampaign();
		$campaign->type = $type;
		$campaign->settings = new CreateCampaignSettings();
		$campaign->settings->subjectLine = $subject;
		$campaign->settings->fromName = 'TestFromName';
		$campaign->settings->replyTo = 'testuser@example.com';

		return $campaign;
	}

	protected function getSingleEntityId()
	{
		return self::CAMPAIGN_ID_1;
	}

	/**
	 * @return CampaignsApi
	 */
	protected function getApi()
	{
		$campaigns = $this->getClient()->campaigns();
		return $campaigns;
	}

	/**
	 * @return CampaignsAllRequest
	 */
	protected function getAllOneParams()
	{
		return new CampaignsAllRequest();
	}

	/**
	 * @return string
	 */
	protected function getBadCreateParam1()
	{
		return self::SUBJECT_BAD;
	}

	/**
	 * @return string
	 */
	protected function getBadCreateParam2()
	{
		return 'badType';
	}

	/**
	 * @return string
	 */
	protected function getBadDeleteId()
	{
		return 'nonExisting';
	}

	/**
	 * @return array|AbstractData
	 */
	protected function getUpdateData()
	{
		$data = new UpdateCampaign();
		$data->settings = new UpdateCampaignSettings();
		$data->settings->subjectLine = 'ChangedSubject';
		return $data;
	}

	/**
	 * @return string
	 */
	protected function getEntityClass()
	{
		return Campaign::class;
	}

	/**
	 * @return string
	 */
	protected function getApiClass()
	{
		return CampaignsApi::class;
	}

	protected function checkEntity($entity, $returnEntity)
	{
		$this->assertEquals($entity->type, $returnEntity->type);
		$this->assertEquals($entity->settings->subjectLine, $returnEntity->settings->subjectLine);
	}
}
