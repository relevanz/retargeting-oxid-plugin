<?php

namespace Relevanz\TrackingOxid\Controller;

use Relevanz\TrackingOxid\Model\Data;

/**
 * @see \OxidEsales\Eshop\Application\Controller\ArticleDetailsController
 */
class ArticleDetailsController extends ArticleDetailsController_parent {
    
    public function render() {
        $article = $this->getProduct();
        if (!empty($article)) {
            Data::addFrontendJavascript('blTrackProductPage', [
                't' => 'd',
                'action' => 'p',
                'id' => $article->getId(),
            ]);
        }
        return parent::render();
    }
    
}