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
        'module_config' => Relevanz\TrackingOxid\Controller\Admin\ModuleConfiguration::class,
    ),
    'controllers'       => array(
        'relevanzdashboard' => \Relevanz\TrackingOxid\Controller\Admin\DashboardController::class,
    ),
    'files'       => array(
        \Relevanz\TrackingOxid\Model\Api::class => \Relevanz\TrackingOxid\Model\Api::class,
    ),
    'templates'   => array(
        'statistics.tpl' => 'relevanz/tracking/views/admin/tpl/statistics.tpl'
    ),
    'blocks'      => array(),
    'settings'    => array(
        array('group' => 'relevanz_config', 'name' => 'sRelevanzApiKey', 'type' => 'str', 'value' => '', ),
        #array('group' => 'relevanz_config', 'name' => 'sRelevanzClientId', 'type' => 'str', 'value' => '', ),
    ),
    'events'      => array(),
);