<?php
namespace Relevanz\RetargetingOxid\Model;

use OxidEsales\Eshop\Core\Registry;

class Data {
    
    public static function addFrontendJavascript(string $controllString, array $params) {
        $clientId = (string) Registry::getConfig()->getConfigParam('sRelevanzClientId');
        if (
            $clientId !== ''
            && in_array(Registry::getConfig()->getConfigParam($controllString), [null, true, ], true)
        ) {
            oxNew(\OxidEsales\Eshop\Core\ViewHelper\JavaScriptRegistrator::class)
                ->addFile('https://pix.hyj.mobi/rt/?'. http_build_query(array_merge(['cid' => $clientId, ], $params)), 10, true)
            ;
        }
    }
    
}