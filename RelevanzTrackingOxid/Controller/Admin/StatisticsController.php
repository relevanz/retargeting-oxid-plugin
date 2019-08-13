<?php
namespace Relevanz\TrackingOxid\Controller\Admin;

class StatisticsController extends \OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController
{
    /**
     *
     * @return string
     */
    public function render()
    {
        parent::render();
        return "main.tpl";
    }
    
    public function validateApiKey() {
        return false;
    }
    
    public function isStore () {
        return true;
    }
    
    
}