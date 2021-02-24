<?php
/**
 * Metadata version
 */
$sMetadataVersion = '2.1';
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
        'de' => '
            <h3>Dynamisches Retargeting mit releva.nz: Wir machen Besucher zu Käufern.</h3>
            <p>Mit der releva.nz Schnittstelle für Webshops machst Du Besucher zu Käufern, auch wenn sie deinen Webshop bereits verlassen haben. Über dynamisches Retargeting werden Kaufinteressenten gezielt auf externen Websites mit personalisierten Online-Bannern angesprochen. Dabei übernimmt releva.nz alle Schritte der Einrichtung: Von der Verpixelung deines Webshops über die vollautomatisierte Gestaltung deiner produktbezogenen Ads bis hin zur Kampagnen-Optimierung durch Künstliche Intelligenz. Steigere mit wenigen Handgriffen und ganz ohne Programmier- oder Design-Kenntnisse die Conversion-Rate deines Webshops auf bis zu 12 Prozent.</p>
            <ul>
                <li><strong>Automatische Erstellung dynamischer Werbebanner:</strong> Du musst deine Display-Anzeigen nicht selbst gestalten - releva.nz generiert automatisch auf Basis deiner Shop-Produkte ansprechende Ads.</li>
                <li><strong>Optimaler Einsatz des Tagesbudgets:</strong> Du legst dein tägliches Werbebudget im Shop-Backend fest - releva.nz sorgt dafür, dass es kosteneffizient eingesetzt wird.</li>
                <li><strong>Kampagnenoptimierung auf Basis künstlicher Intelligenz:</strong> Selbstlernende Algorithmen optimieren die Auslieferung deiner Ads. Zum Beispiel werden Besucher, die gerade deinen Shop verlassen haben, vorrangig angesprochen.</li>
                <li><strong>Einfache Integration des Retargeting-Pixels:</strong> Die releva.nz Schnittstelle übernimmt den technischen Part für dich und platziert den Retargeting-Pixel selbstständig auf allen relevanten Seiten deines Webshops.</li>
                <li><strong>Dosierter Einsatz von Retargeting-Ads:</strong> Nur Webshop-Besuchern, die noch nichts bei dir gekauft haben, werden Werbebanner auf externen Websites angezeigt. Darüber hinaus achten wir sehr genau darauf, deine potentiellen Kunden nicht mit Ads zu überfluten.</li>
                <li><strong>Anzeigen-Distribution an bis zu 30 verschiedene Werbenetzwerke:</strong> Selbstverständlich werden die Ads auf dem Google Displaynetzwerk ausgespielt - darüber hinaus können mit releva.nz weitere 30 attraktive Werbenetzwerke angebunden werden. So kannst Du bis zu 85% aller Werbeplätze im DACH-Raum erreichen.</li>
                <li><strong>Echtzeit-Statistiken im Webshop-Backend:</strong> Mit den Live-Statistiken im Shop-Backend hast Du dein Werbebudget sowie das Verhalten deiner Shop-Besucher immer im Blick und siehst genau, wie effizient unser selbstlernender Algorithmus Anzeigen aussteuert.</li>
            </ul>
        ',
        'en' => '
            <h3>Dynamic Retargeting With relva.nz: We Convert Visitors to Buyers</h3>
            <p>The releva.nz plugin for OXID converts visitors into buyers, even when they already left your webshop. Via dynamic retargeting, potential buyers will be targeted with personalized online banners on external websites. Releva.nz takes care of all set-up steps: From pixelating your webshop over automatically designing your product-based ads to optimizing campaigns with Artificial Intelligence. With just a few clicks, you can increase the conversion rate of your webshop until up to 12 percent without any programming or design skills.</p>
            <ul>
                <li><strong>Automated creation of dynamic ad banners:</strong> You don’t have to design your display ads by yourself - releva.nz generates appealing ads automatically based on your shop products.</li>
                <li><strong>Optimal use of the daily budget:</strong> You determine your daily ad budget in the Shop backend and releva.nz makes sure it’s being used cost-efficiently.</li>
                <li><strong>Campaign optimization based on Artificial Intelligence:</strong> Self-learning algorithms optimize the delivery of your ads. For example: Mainly visitors who have just left your store are targeted.</li>
                <li><strong>Simple integration of the retargeting pixel:</strong> The releva.nz plugin takes care of the technical aspects for you and places the retargeting pixel independently on all relevant pages of your webshop.</li>
                <li><strong>Metered retargeting ads:</strong> Only webshop visitors, who haven’t bought anything from you are going to be seeing ad banners on external websites. We pay close attention to not overdo it and not flood your potential clients with too many ads.</li>
                <li><strong>Ad distribution to up to 30 ad networks:</strong> Of course, ads are played on the Google display network. Additionally, releva.nz can connect you to 30 more ad networks. This lets you reach 85% of all ad locations in DACH (Germany, Austria, Switzerland) as well as 85% of ad spaces on english sites.</li>
                <li><strong>Realtime statistics in the webshop backend:</strong> Live statistics in the OXID backend allow you to watch over your ad budget as well as your visitors’ behavior. You can clearly follow how efficiently our self-learning algorithm places ads.</li>
            </ul>
        ',
    ),
    'thumbnail'   => 'out/pictures/relevanz-logo.png',
    'version'     => '1.0.3',
    'url'         => 'https://www.releva.nz',
    'email'       => 'hello@releva.nz',
    'extend'      => array(
        'module_config' => \Relevanz\RetargetingOxid\Controller\Admin\ModuleConfiguration::class,
    ),
    'controllers'       => array(
        'relevanzdashboard' => \Relevanz\RetargetingOxid\Controller\Admin\DashboardController::class,
        'relevanzcontroller' => \Relevanz\RetargetingOxid\Controller\RelevanzController::class,
    ),
    'templates'   => array(
        'statistics.tpl' => 'relevanz/retargeting/views/admin/tpl/statistics.tpl'
    ),
    'blocks'      => array(
        [
            'template' => 'layout/footer.tpl',
            'block' => 'footer_main',
            'file' => '/views/frontend/layout/footer.tpl'
        ],
    ),
    'smartyPluginDirectories' => [
        'Smarty/Plugin',
    ],
    'settings'    => array(
        array('group' => 'relevanz_settings', 'name' => 'sRelevanzApiKey', 'type' => 'str', 'value' => '', ),
        #array('group' => 'relevanz_settings', 'name' => 'sRelevanzClientId', 'type' => 'str', 'value' => '', ),
        array('group' => 'relevanz_settings', 'name' => 'sAlternativeCookieCheck', 'type' => 'str', 'value' => 'var relevanzRetargetingForcePixel = true;', ),
        array('group' => 'relevanz_retargeting', 'name' => 'blRetargetingEnabled', 'type' => 'bool', 'value' => true, ),
    ),
    'events'      => array(),
);