<?php
/**
 * 
 * @param type $params
 * @param Smarty $smarty
 * @return string
 */
function smarty_function_get_relevanz_tracking_url($params, Smarty &$smarty)
{
    $url = '';
    $oView = $smarty->get_template_vars('oView');
    $oConfig = $oView->getConfig();
    if ($oConfig->getConfigParam('blRetargetingEnabled')) {
        $cId = $oConfig->getConfigParam('sRelevanzClientId');
        if (!empty($cId)) {
            switch ($oView->getClassName()) {
                case 'thankyou': {
                    $oOrder = $oView->getOrder();
                    $productIds = [];
                    foreach ($oOrder->getOrderArticles() as $oOrderArticle) {
                        $productIds[] = $oOrderArticle->oxorderarticles__oxartid->value;
                    }
                    $url = \Releva\Retargeting\Base\RelevanzApi::RELEVANZ_CONV_URL.'?cid='.$cId.'&orderId='.$oOrder->getId().'&amount='.($oOrder->oxorder__oxtotalbrutsum->value).'&products='.implode(',', $productIds);
                    break;
                }
                case 'alist': {
                    $url = \Releva\Retargeting\Base\RelevanzApi::RELEVANZ_TRACKER_URL.'?t=d&action=c&cid='.$cId.'&id='.$oView->getActiveCategory()->getId();
                    break;
                }
                case 'details': {
                    $url = \Releva\Retargeting\Base\RelevanzApi::RELEVANZ_TRACKER_URL.'?t=d&action=p&cid='.$cId.'&id='.$oView->getProduct()->getId();
                    break;
                }
                default : {
                    $url = \Releva\Retargeting\Base\RelevanzApi::RELEVANZ_TRACKER_URL.'?t=d&action=s&cid='.$cId;
                }
            }
        }
    }
    if (array_key_exists('assign', $params)) {
        $smarty->assign($params['assign'], $url);
    } else {
        return $url;
    }
}