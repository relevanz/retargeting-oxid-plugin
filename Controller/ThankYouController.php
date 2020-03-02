<?php

namespace Relevanz\RetargetingOxid\Controller;

use Relevanz\RetargetingOxid\Model\Data;

/**
 * @see \OxidEsales\Eshop\Application\Controller\ThankYouController
 */
class ThankYouController extends ThankYouController_parent {
    
    public function render() {
        /* @var $order \OxidEsales\Eshop\Application\Model\Order */
        $order = $this->getOrder();
        if (!empty($order)) {
            $itemIds = [];
            foreach ($order->getOrderArticles() as $orderArticle) {
                /* @var $orderArticle \OxidEsales\Eshop\Application\Model\OrderArticle */
                $itemIds[] = $orderArticle->oxorderarticles__oxartid->value;
            }
            Data::addFrontendJavascript('blRetargetingEnabled', [
                'orderId'   => (string)$order->getId(),
                'amount'    => number_format($order->oxorder__oxtotalordersum->value, 2, '.', ''),
                'eventName' => implode(',', $itemIds),
                'network'   => 'relevanz'
            ]);
        }
        return parent::render();
    }
    
}