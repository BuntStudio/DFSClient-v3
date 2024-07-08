<?php


namespace DFSClientV3\Models\BacklinksApi;

use DFSClientV3\Entity\Custom\BackLinksPageIntersectionEntityMain;
use DFSClientV3\Models\AbstractModel;
use DFSClientV3\Models\BacklinksApi\Dictionaries\PageIntersectionDictionary;

class BackLinksPageIntersection extends AbstractModel
{
    protected $method = 'POST';
    protected $isSupportedMerge = true;
    protected $pathToMainData = 'tasks->{$postID}->result';
    protected $requestToFunction = 'backlinks/page_intersection/live';
    protected $resultShouldBeTransformedToArray = true;

    protected $jsonContainVariadicType = false;
//
    protected $pathsToDictionary = [
        'tasks->(:number)->result->(:number)->items->(:number)->page_intersection' => PageIntersectionDictionary::class
    ];

    protected $useNewMapper = true;

    /**
     * @param array $targets
     * @return $this
     */
    public function setTargets(array $targets)
    {
        $this->payload['targets'] = $targets;
        return $this;
    }

    /**
     * @param array $filters
     * @return $this
     */
    public function setFilters(array $filters)
    {
        $this->payload['filters'] = $filters;
        return $this;
    }

    /**
     * @param array $orderBy
     * @return $this
     */
    public function setOrderBy(array $orderBy)
    {
        $this->payload['order_by'] = $orderBy;
        return $this;
    }

    /**
     * @param int $offset
     * @return $this
     */
    public function setOffset(int $offset)
    {
        $this->payload['offset'] = $offset;
        return $this;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function setLimit(int $limit)
    {
        $this->payload['limit'] = $limit;
        return $this;
    }

    /**
     * @param int $internalListLimit
     * @return $this
     */
    public function setInternalListLimit(int $internalListLimit)
    {
        $this->payload['internal_list_limit'] = $internalListLimit;
        return $this;
    }

    /**
     * @param string $backLinksStatusType
     * @return $this
     */
    public function setBackLinksStatusType(string $backLinksStatusType)
    {
        $this->payload['backlinks_status_type'] = $backLinksStatusType;
        return $this;
    }

	/**
	 * @param string $tag
	 * @return $this
	 */
    public function setTag(string $tag)
    {
        $this->payload['tag'] = $tag;
        return $this;
    }

    /**
     * @param array $excludeTargets
     * @return $this
     */
    public function setExcludeTargets(array $excludeTargets)
    {
        $this->payload['exclude_targets'] = $excludeTargets;
        return $this;
    }

    /**
     * @param bool $includeSubdomains
     * @return $this
     */
    public function setIncludeSubdomains(bool $includeSubdomains)
    {
        $this->payload['include_subdomains'] = $includeSubdomains;
        return $this;
    }

	/**
	 * @param bool $includeIndirectLinks
	 * @return $this
	 */
	public function setIncludeIndirectLinks(bool $includeIndirectLinks)
	{
		$this->payload['include_indirect_links'] = $includeIndirectLinks;

		return $this;
	}

	/**
	 * @param string $intersectionMode
	 * @return $this
	 */
	public function setIntersectionMode(string $intersectionMode)
	{
		$this->payload['intersection_mode'] = $intersectionMode;
		return $this;
	}

	/**
	 * @param bool $excludeInternalBackLinks
	 * @return $this
	 */
	public function setExcludeInternalBackLinks(bool $excludeInternalBackLinks)
	{
		$this->payload['exclude_internal_backlinks'] = $excludeInternalBackLinks;
		return $this;
	}

    public function initCustomFunctionForPaths(): array
    {
        return [
            'tasks->(:number)->data->targets' => function($key, $value) {
              return (array)$value;
            },
            'tasks->(:number)->result->(:number)->targets' => function($key, $value) {
                return (array)$value;
            }
        ];
    }

    public function get(): BackLinksPageIntersectionEntityMain
    {
        return parent::get(); // TODO: Change the autogenerated stub
    }
}
