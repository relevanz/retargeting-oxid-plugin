<?php

namespace Relevanz\RetargetingOxid\Controller;

use Relevanz\RetargetingOxid\Model\Data;

/**
 * @see \OxidEsales\Eshop\Application\Controller\ArticleDetailsController
 */
class ArticleDetailsController extends ArticleDetailsController_parent {
    
    public function render() {
        $article = $this->getProduct();
        if (!empty($article)) {
            Data::addFrontendJavascript('blRetargetingEnabled', [
                't' => 'd',
                'action' => 'p',
                'id' => $article->getId(),
            ]);
        }
        return parent::render();
    }
    
}