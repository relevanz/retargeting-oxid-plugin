<?php
namespace Relevanz\RetargetingOxid\Controller;

use Relevanz\RetargetingOxid\Model\Data;

/**
 * @see \OxidEsales\Eshop\Application\Controller\StartController
 */
class StartController extends StartController_parent {
    
    public function render() {
        Data::addFrontendJavascript('blRetargetingEnabled', [
            't' => 'd',
            'action' => 's'
        ]);
        return parent::render();
    }
    
}