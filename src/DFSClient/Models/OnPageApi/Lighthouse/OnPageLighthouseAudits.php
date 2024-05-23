<?php

namespace DFSClientV3\Models\OnPageApi\Lighthouse;

use DFSClientV3\Entity\Custom\OnPageLighthouseAuditsEntityMain;
use DFSClientV3\Models\AbstractModel;

class OnPageLighthouseAudits extends AbstractModel
{
    protected $method = 'GET';
    protected $isSupportedMerge = true;
    protected $pathToMainData = 'tasks->0->result';
    protected $requestToFunction = 'on_page/lighthouse/audits';

    /**
     * @return OnPageLighthouseAuditsEntityMain
     */
    public function get(): OnPageLighthouseAuditsEntityMain
    {
        return parent::get();
    }

    /**
     * @param array $modelPool
     * @throws \Exception
     */
    public static function getAfterMerge(array $modelPool)
    {
        return parent::getAfterMerge($modelPool); // TODO: Change the autogenerated stub
    }
}
