<?php
namespace Relevanz\RetargetingOxid\Controller;

use OxidEsales\Eshop\Core\Registry;

class RelevanzProductExport extends \OxidEsales\Eshop\Application\Controller\FrontendController {
    
    public function render() {
        if (Registry::getRequest()->getRequestParameter('auth') !== md5(Registry::getConfig()->getConfigParam('sRelevanzApiKey').':'.((string) Registry::getConfig()->getConfigParam('sRelevanzClientId')))) {
            throw new \Exception('Not authed');
        }
        
        try {
            $result = $this->getProducts();
        } catch (\Exception $e) {
            $result = array(
                'status' => 'ERROR',
                'message' => $e->getMessage()
            );
        }
        $type = Registry::getRequest()->getRequestParameter('type', 'json');
        $type = in_array($type, ['json', 'csv']) ? $type : 'json';
        if ($type === 'json') {
            header('Content-Type: application/json');
            echo json_encode($result);
        } else/*if ($type === 'csv')*/ {
            header('Content-type: text/csv');
            $stream = fopen('data://text/plain,', 'w+');
            foreach ($result as $val) {
                fputcsv($stream, $val, ',', '"');
            }
            rewind($stream);
            echo stream_get_contents($stream);
        }
        die;
    }
    
    private function getProducts() {
        /* @var $articleList \OxidEsales\Eshop\Application\Model\ArticleList */
        $articleList = oxNew(\OxidEsales\Eshop\Application\Model\ArticleList::class);
        $articleList->getList();
        $result = [];
        foreach ($articleList as $article) {
            /* @var $article \OxidEsales\Eshop\Application\Model\Article */
            if (!$article->isBuyable()) {
                continue;
            }
            $result[] = array(
                'product_id' => $article->getId(),
                'category_ids' => $article->getCategory()->getId(),
                'product_name' => $article->oxarticles__oxtitle->value,
                'short_description' => $article->oxarticles__oxshortdesc->value,
                'long_description' => $article->getLongDesc(),
                'price' => $article->getPrice()->getPrice(),
                'link' => $article->getLink(),
                'image' => $article->getPictureUrl(),
            );
        }
        return $result;
    }
    
}