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
    'id'          => 'releva.nz Tracking',
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
    ),
    'controllers'       => array(
        'relevanzstatistics' => \Relevanz\TrackingOxid\Controller\Admin\StatisticsController::class,
    ),
    'files'       => array(),
    'templates'   => array(
        'main.tpl' => 'relevanz/tracking/views/admin/tpl/statistics.tpl'
    ),
    'blocks'      => array(),
    'settings'    => array(),
    'events'      => array(),
);