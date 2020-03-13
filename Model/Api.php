<?php
namespace Relevanz\RetargetingOxid\Model;

use OxidEsales\Eshop\Core\Registry;

class Api {

    const PROTOCOL          =   'https';
    const STATISTIC_URL     =   'api.hyj.mobi';
    
    private $verificationTimeOut = 60;
    
    /**
     * @param string $apiKey
     */
    public function getUser($apiKey = null){
        $productExportUrl = str_replace(urlencode(':auth'), ':auth', Registry::getConfig()->getSslShopUrl().'?cl=relevanzproductexport&type=csv&auth:auth'). (Registry::getRequest()->getRequestParameter('shp') ? '&shp='.Registry::getRequest()->getRequestParameter('shp') : '');
        $response = $this->_request(static::PROTOCOL."://".static::STATISTIC_URL.'/user/get', [
            'apikey' => $apiKey,
            'product-export-url' => $productExportUrl,
        ]);
        if ($response['status'] === 'success') {
            $result = $response['result'];
            if(isset($result['user_id']) && ($clientId = $result['user_id'])) {
                Registry::getConfig()->saveShopConfVar('str', 'sRelevanzClientId', $clientId, null, 'module:releva.nz-retargeting');
            }
        } else {
            Registry::getConfig()->saveShopConfVar('str', 'sRelevanzClientId', '', null, 'module:releva.nz-retargeting');
            throw new \Exception($response['message']);
        }
        return $response;
    }
    
    /**
     * @param string $url
     * @param array $parameters
     * @return array
     */
    private function _request($url = null, $parameters = []){
        $response = ['status' => 'error', ];
        try {
            /* @var $curl \OxidEsales\Eshop\Core\Curl */
            $curl = oxNew(\OxidEsales\Eshop\Core\Curl::class);
            $curl->setMethod('GET');
            $curl->setUrl($url);
            $curl->setParameters($parameters);
            $curl->setOption('CURLOPT_TIMEOUT', $this->verificationTimeOut);
            $data = $curl->execute();
            $json = json_decode($data, true);
            if(is_array($json) && $curl->getStatusCode() == 200) {
                $response['status'] = 'success';
                $response['result'] = $json;
            } elseif (is_array($json)) {
                $response['message'] = (isset($json['message']) && $json['message']) ? $json['message'] : ((isset($json['code']) && $json['code']) ? $json['code'] : $data);
            } else {
                $response['message'] = $data;
            }
        } catch (\Exception $e) {
            $response['message'] = $e->getMessage();
        }
        return $response;
    }
}
