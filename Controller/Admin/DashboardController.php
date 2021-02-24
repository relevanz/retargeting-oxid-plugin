<?php
namespace Relevanz\RetargetingOxid\Controller\Admin;

use OxidEsales\Eshop\Core\Registry;
use Releva\Retargeting\Base\RelevanzApi;

class DashboardController extends \OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController
{
    
    protected $_sThisTemplate = 'statistics.tpl';
    
    /**
     * Dont know if false can happen
     * @return boolean
     */
    public function isStore () {
        return (int) Registry::getConfig()->getActiveShop()->getId() !== 0;
    }
    /**
     * @return boolean
     */
    public function validateApiKey() {
        $apiKey = $this->getApiKey();
        if ($apiKey) {
            try {
                Registry::get(RelevanzApi::class)->verifyApiKey($apiKey); //throws Ecxeption
                return true;
            } catch (\Exception $exception) {
            }
        }
        return false;
    }
    
    /**
     * @return string
     */
    public function getApiKey () {
        return Registry::getConfig()->getConfigParam('sRelevanzApiKey');
    }
    
    public function sendApiKey () {
        $apiKey = Registry::getRequest()->getRequestParameter('api_key');
        Registry::getConfig()->saveShopConfVar('str', 'sRelevanzApiKey', $apiKey, null, 'module:releva.nz-retargeting');
    }
    
}