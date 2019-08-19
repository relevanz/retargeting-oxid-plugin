<?php
namespace Relevanz\TrackingOxid\Controller\Admin;

use OxidEsales\Eshop\Core\Registry;
use Relevanz\TrackingOxid\Model\Api;
use OxidEsales\Eshop\Core\Exception\StandardException;

/**
 * @see \OxidEsales\Eshop\Application\Controller\Admin\ModuleConfiguration
 */
class ModuleConfiguration extends ModuleConfiguration_parent {
    
    public function saveConfVars()
    {
        $sModuleId = $this->getEditObjectId();
        if ($sModuleId === 'releva.nz Tracking') {
            $confStrs = $this->getConfig()->getRequestParameter('confstrs');
            try {
                Registry::get(Api::class)->getUser($confStrs['sRelevanzApiKey']);
            } catch (\Exception $ex) {
                Registry::getUtilsView()->addErrorToDisplay(new StandardException($ex->getMessage()));
            }
        }
        parent::saveConfVars();
    }
    
}