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

	public function create(AbstractData $data): TemplateInstance
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

	public function get(string $id, ?AbstractRequest $params = null): ?TemplateInstance
	{
		return $this->fetchOne(TemplateInstance::class, $id, $params);
	}

	public function update(string $id, $data): TemplateInstance
	{
		return $this->doUpdate($id, $data, TemplateInstance::class);
	}

	public function delete(string $id): bool
	{
		return (bool)$this->doDelete($id);
	}

	/**
	 * @param AbstractRequest|TemplatesRequest|null $params
	 */
	public function getDefault(string $templateId, $params = null): ?DefaultContent
	{
		$data = $this->fetch(
			$this->getPath(self::ACTION_ONE, [$templateId, 'default-content']),
			null,
			$params
		);
		if (!$data) {
			return null;
		}
		$className = DefaultContent::class;
		return new $className($data);
	}
}
