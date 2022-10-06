<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Api\Templates;

use Stefna\Mailchimp\Api\CollectionRestApi;
use Stefna\Mailchimp\Api\Templates\Request\TemplatesRequest;
use Stefna\Mailchimp\Model\Template\DefaultContent;
use Stefna\Mailchimp\Model\Template\NewTemplateInstance;
use Stefna\Mailchimp\Model\Template\TemplateInstance;

class Templates extends CollectionRestApi
{
	public function getMethodUrl(): string
	{
		return 'templates';
	}

	/**
	 * @param NewTemplateInstance $data
	 * @return TemplateInstance
	 */
	public function create($data)
	{
		return $this->doCreate($data, TemplateInstance::class);
	}

	/**
	 * @param \Stefna\Mailchimp\Other\AbstractRequest $params
	 * @return TemplateInstance[]
	 */
	public function all($params = null)
	{
		return $this->fetchAll(TemplateInstance::class, 'templates', $params);
	}

	/**
	 * @param mixed $id
	 * @param \Stefna\Mailchimp\Other\AbstractRequest|null $params
	 * @return TemplateInstance
	 */
	public function get($id, $params = null)
	{
		return $this->fetchOne(TemplateInstance::class, $id, $params);
	}

	/**
	 * @param string $id
	 * @param array $data
	 * @return TemplateInstance
	 */
	public function update(string $id, $data)
	{
		return $this->doUpdate($id, $data, TemplateInstance::class);
	}

	public function delete(string $id): ?bool
	{
		return $this->doDelete($id);
	}

	/**
	 * @param int $templateId
	 * @param TemplatesRequest $params
	 * @return DefaultContent|null
	 */
	public function getDefault($templateId, $params = null)
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
