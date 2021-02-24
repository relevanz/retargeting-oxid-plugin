<?php
namespace Relevanz\RetargetingOxid\Internal;

use Releva\Retargeting\Base\AbstractShopInfo;
use OxidEsales\Eshop\Core\Registry;

class ShopInfo extends AbstractShopInfo {
    
    public static function getShopSystem () {
        return 'Oxid';
    }
    
    public static function getShopVersion () {
        return Registry::getConfig()->getEdition().' '.Registry::getConfig()->getVersion();
    }
    
    public static function getDbVersion() {
        $database = \OxidEsales\Eshop\Core\DatabaseProvider::getDb(\OxidEsales\Eshop\Core\DatabaseProvider::FETCH_MODE_ASSOC);
        $rs = $database->select('SELECT @@version AS `version`, @@version_comment AS `server`;');
        return is_array($rs->fields) && count($rs->fields) == 2 ? $rs->fields : parent::getDbVersion();
    }
    
    public static function getUrlCallback() {
        return
            Registry::getConfig()->getSslShopUrl().'?cl=relevanzcontroller&fnc=callback&auth:auth'.(
                Registry::getRequest()->getRequestParameter('shp')
                ? '&shp='.Registry::getRequest()->getRequestParameter('shp')
                : ''
            )
        ;
    }
    
    public static function getUrlProductExport() {
        return
            Registry::getConfig()->getSslShopUrl().'?cl=relevanzcontroller&fnc=productexport&auth:auth'.(
                Registry::getRequest()->getRequestParameter('shp')
                ? '&shp='.Registry::getRequest()->getRequestParameter('shp')
                : ''
            )
        ;
    }
}