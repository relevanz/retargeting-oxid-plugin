<?php
/**
 * @TODO LICENCE HERE
 */
/**
 * Metadata version
 */
$sMetadataVersion = '2.0';
/**
 * Module information
 */
$aModule = array(
    'id'          => 'releva.nz-retargeting',
    'title'       => array(
        'de' => 'releva.nz Retargeting',
        'en' => 'releva.nz Retargeting',
    ),
    'description' => array(
        'de' => '<h2>releva.nz Retargeting</h2>',
        'en' => '<h2>releva.nz Retargeting</h2>',
    ),
    'thumbnail'   => 'out/pictures/relevanz-logo.png',
    'version'     => '1.0.0',
    'url'         => 'https://www.releva.nz',
    'email'       => 'hello@releva.nz',
    'extend'      => array(
        'module_config' => \Relevanz\RetargetingOxid\Controller\Admin\ModuleConfiguration::class,
        'start' => \Relevanz\RetargetingOxid\Controller\StartController::class,
        'alist' => \Relevanz\RetargetingOxid\Controller\ArticleListController::class,
        'details' => \Relevanz\RetargetingOxid\Controller\ArticleDetailsController::class,
        'thankyou' => \Relevanz\RetargetingOxid\Controller\ThankYouController::class,
    ),
    'controllers'       => array(
        'relevanzdashboard' => \Relevanz\RetargetingOxid\Controller\Admin\DashboardController::class,
        'relevanzproductexport' => \Relevanz\RetargetingOxid\Controller\RelevanzProductExport::class,
    ),
    'files'       => array(
        \Relevanz\RetargetingOxid\Model\Api::class => \RelevaRetargetingOxidxid\Model\Api::class,
        \Relevanz\RetargetingOxid\Model\Data::class => \RelevaRetargetingOxidxid\Model\Data::class,
    ),
    'templates'   => array(
        'statistics.tpl' => 'relevanz/retargeting/views/admin/tpl/statistics.tpl'
    ),
    'blocks'      => array(),
    'settings'    => array(
        array('group' => 'relevanz_settings', 'name' => 'sRelevanzApiKey', 'type' => 'str', 'value' => '', ),
        #array('group' => 'relevanz_settings', 'name' => 'sRelevanzClientId', 'type' => 'str', 'value' => '', ),
        array('group' => 'relevanz_retargeting', 'name' => 'blRetargetingEnabled', 'type' => 'bool', 'value' => 'true', ),
    ),
    'events'      => array(),
);