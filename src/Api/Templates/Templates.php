<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Api\Templates;

use Stefna\Mailchimp\Api\CollectionRestApi;
use Stefna\Mailchimp\Api\Templates\Request\TemplatesRequest;
use Stefna\Mailchimp\Model\Template\DefaultContent;
use Stefna\Mailchimp\Model\Template\TemplateInstance;
use Stefna\Mailchimp\Other\AbstractData;
use Stefna\Mailchimp\Other\AbstractRequest;

class Templates extends CollectionRestApi
{
	public function getMethodUrl(): string
	{
		return 'templates';
	}

	/**
	 * @param AbstractData $data
	 * @return TemplateInstance|AbstractData
	 */
	public function create(AbstractData $data): AbstractData
	{
		return $this->doCreate($data, TemplateInstance::class);
	}

	/**
	 * @param AbstractRequest $params
	 * @return TemplateInstance[]
	 */
	public function all($params = null): array
	{
		return $this->fetchAll(TemplateInstance::class, 'templates', $params);
	}

	/**
	 * @param string $id
	 * @param AbstractRequest|null $params
	 * @return AbstractData|TemplateInstance|null
	 */
	public function get(string $id, ?AbstractRequest $params = null)
	{
		return $this->fetchOne(TemplateInstance::class, $id, $params);
	}

	public function update(string $id, $data)
	{
		return $this->doUpdate($id, $data, TemplateInstance::class);
	}

	public function delete(string $id): ?bool
	{
		return $this->doDelete($id);
	}

	/**
	 * @param string $templateId
	 * @param AbstractRequest|TemplatesRequest|null $params
	 * @return DefaultContent|null
	 */
	public function getDefault(string $templateId, $params = null): ?DefaultContent
	{
		$data = $this->fetch($this->getPath(self::ACTION_ONE, [$templateId, 'default-content']),
			null, $params);
		if (!$data) {
			return null;
		}
		$className = DefaultContent::class;
		return new $className($data);
	}
}
