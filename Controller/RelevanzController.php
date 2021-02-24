<?php
namespace Relevanz\RetargetingOxid\Controller;

use OxidEsales\Eshop\Core\Registry;
use Releva\Retargeting\Base\Export\ProductJsonExporter;
use Releva\Retargeting\Base\Export\ProductCsvExporter;
use Releva\Retargeting\Base\Export\Item\ProductExportItem;

class RelevanzController extends \OxidEsales\Eshop\Application\Controller\FrontendController {
    
    const ITEMS_PER_PAGE = 10;
    
    public function callback() {
        $this->checkAuth();
        $shopInfo = Registry::get(\Relevanz\RetargetingOxid\Internal\ShopInfo::class);
        $callbackData = [
//            'plugin-version' => $shopInfo->getPluginVersion(),
            'shop' => [
                'system' => $shopInfo->getShopSystem(),
                'version' => $shopInfo->getShopVersion(),
            ],
            'environment' => $shopInfo->getServerEnvironment(),
            'callbacks' => [
                'callback' => [
                    'url' => $shopInfo->getUrlCallback(),
                    'parameters' => [],
                ],
                'export' => [
                    'url' => $shopInfo->getUrlProductExport(),
                    'parameters' => [
                        'format' => [
                            'values' => ['csv', 'json'],
                            'default' => 'csv',
                            'optional' => true,
                        ],
                        'page' => [
                            'type' => 'integer',
                            'optional' => true,
                            'info' => ['items-per-page' => self::ITEMS_PER_PAGE, ],
                        ],
                    ],
                ],
            ]
        ];
        header('Content-Type:application/json; charset="utf-8');
        echo json_encode($callbackData);
        die;
    }
    
    public function productExport() {
        $this->checkAuth();
        $exporter = Registry::getRequest()->getRequestParameter('type') === 'json' ? new ProductJsonExporter() : new ProductCsvExporter();
        /* @var $articleList \OxidEsales\Eshop\Application\Model\ArticleList */
        $articleList = oxNew(\OxidEsales\Eshop\Application\Model\ArticleList::class);
        $page = (int) Registry::getRequest()->getRequestParameter('page') < 1 ? null : (int) Registry::getRequest()->getRequestParameter('page') - 1;
        if ($page !== null) {
            $articleList->setSqlLimit($page * self::ITEMS_PER_PAGE, self::ITEMS_PER_PAGE);
        };
        $articleList->getList();
        if ($articleList->count() === 0) {
            http_response_code(404);
            die;
        }
        foreach ($articleList as $article) {
            /* @var $article \OxidEsales\Eshop\Application\Model\Article */
            if (!$article->isBuyable()) {
                continue;
            }
            $exporter->addItem(
                new ProductExportItem(
                    (string) $article->getId(),
                    (array) $article->getCategory()->getId(),//@todo ids
                    (string) $article->oxarticles__oxtitle->value,
                    (string) $article->oxarticles__oxshortdesc->value,
                    (string) $article->getLongDesc(),
                    (float) $article->getPrice()->getPrice(),
                    (float) $article->getPrice()->getPrice(),//@todo offer
                    (string) $article->getLink(),
                    (string) $article->getPictureUrl()
                )
            );
        }
        foreach ($exporter->getHttpHeaders() as $headerKey => $headerValue) {
            header(sprintf('%s:%s', $headerKey, $headerValue));
        }
        echo $exporter->getContents();
        die;
    }
    
    protected function checkAuth() {
        if (Registry::getRequest()->getRequestParameter('auth') !== md5(Registry::getConfig()->getConfigParam('sRelevanzApiKey').':'.((string) Registry::getConfig()->getConfigParam('sRelevanzClientId')))) {
            http_response_code(401);
            die;
        }
        return $this;
    }
}