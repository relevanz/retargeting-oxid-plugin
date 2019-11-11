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
    'id'          => 'releva.nz-tracking',
    'title'       => array(
        'de' => 'releva.nz Tracking',
        'en' => 'releva.nz Tracking',
    ),
    'description' => array(
        'de' => '<h2>releva.nz Tracking</h2>',
        'en' => '<h2>releva.nz Tracking</h2>',
    ),
    'thumbnail'   => 'out/pictures/relevanz-logo.png',
    'version'     => '1.0.0',
    'url'         => 'https://www.releva.nz',
    'email'       => 'hello@releva.nz',
    'extend'      => array(
        'module_config' => \Relevanz\TrackingOxid\Controller\Admin\ModuleConfiguration::class,
        'start' => \Relevanz\TrackingOxid\Controller\StartController::class,
        'alist' => \Relevanz\TrackingOxid\Controller\ArticleListController::class,
        'details' => \Relevanz\TrackingOxid\Controller\ArticleDetailsController::class,
        'thankyou' => \Relevanz\TrackingOxid\Controller\ThankYouController::class,
    ),
    'controllers'       => array(
        'relevanzdashboard' => \Relevanz\TrackingOxid\Controller\Admin\DashboardController::class,
        'relevanzproductexport' => \Relevanz\TrackingOxid\Controller\RelevanzProductExport::class,
    ),
    'files'       => array(
        \Relevanz\TrackingOxid\Model\Api::class => \Relevanz\TrackingOxid\Model\Api::class,
        \Relevanz\TrackingOxid\Model\Data::class => \Relevanz\TrackingOxid\Model\Data::class,
    ),
    'templates'   => array(
        'statistics.tpl' => 'relevanz/tracking/views/admin/tpl/statistics.tpl'
    ),
    'blocks'      => array(),
    'settings'    => array(
        array('group' => 'relevanz_settings', 'name' => 'sRelevanzApiKey', 'type' => 'str', 'value' => '', ),
        #array('group' => 'relevanz_settings', 'name' => 'sRelevanzClientId', 'type' => 'str', 'value' => '', ),
        array('group' => 'relevanz_tracking', 'name' => 'blTrackFrontPage', 'type' => 'bool', 'value' => 'true', ),
        array('group' => 'relevanz_tracking', 'name' => 'blTrackCategoryPage', 'type' => 'bool', 'value' => 'true', ),
        array('group' => 'relevanz_tracking', 'name' => 'blTrackProductPage', 'type' => 'bool', 'value' => 'true', ),
        array('group' => 'relevanz_tracking', 'name' => 'blTrackOrderSuccessPage', 'type' => 'bool', 'value' => 'true', ),
    ),
    'events'      => array(),
);