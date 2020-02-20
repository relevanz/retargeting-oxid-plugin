<?php
namespace Relevanz\TrackingOxid\Controller;

use Relevanz\TrackingOxid\Model\Data;

/**
 * @see \OxidEsales\Eshop\Application\Controller\StartController
 */
class StartController extends StartController_parent {
    
    public function render() {
        Data::addFrontendJavascript('blTrackingEnabled', [
            't' => 'd',
            'action' => 's'
        ]);
        return parent::render();
    }
    
}