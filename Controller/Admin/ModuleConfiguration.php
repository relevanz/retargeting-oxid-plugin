<?php
namespace Relevanz\RetargetingOxid\Controller\Admin;

use OxidEsales\Eshop\Core\Registry;
use Releva\Retargeting\Base\RelevanzApi;
use Relevanz\RetargetingOxid\Internal\ShopInfo;
use OxidEsales\Eshop\Core\Exception\StandardException;

/**
 * @see \OxidEsales\Eshop\Application\Controller\Admin\ModuleConfiguration
 */
class ModuleConfiguration extends ModuleConfiguration_parent {
    
    public function saveConfVars()
    {
        $sModuleId = $this->getEditObjectId();
        if ($sModuleId === 'releva.nz-retargeting') {
            $confStrs = $this->getConfig()->getRequestParameter('confstrs');
            try {
                $relevanzApi = Registry::get(RelevanzApi::class);
                $shopInfo = Registry::get(ShopInfo::class);
                $userId = (int) RelevanzApi::verifyApiKey($confStrs['sRelevanzApiKey'], [
                    'callback-url' => $shopInfo->getUrlCallback(),
                ])->getUserId();
                Registry::getConfig()->saveShopConfVar('str', 'sRelevanzClientId', $userId, null, 'module:releva.nz-retargeting');
            } catch (\Exception $ex) {
                Registry::getConfig()->saveShopConfVar('str', 'sRelevanzClientId', '', null, 'module:releva.nz-retargeting');
                Registry::getUtilsView()->addErrorToDisplay(new StandardException($ex->getMessage()));
            }
        }
        parent::saveConfVars();
    }
    
}