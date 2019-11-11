<?php

namespace Relevanz\TrackingOxid\Controller;

use Relevanz\TrackingOxid\Model\Data;

/**
 * @see \OxidEsales\Eshop\Application\Controller\ArticleListController
 */
class ArticleListController extends ArticleListController_parent {
    
    public function render() {
        $category = $this->getCategoryToRender();
        if (!empty($category)) {
            Data::addFrontendJavascript('blTrackCategoryPage', [
                't' => 'd',
                'action' => 'c',
                'id' => $category->getId()
            ]);
        }
        return parent::render();
    }
    
}