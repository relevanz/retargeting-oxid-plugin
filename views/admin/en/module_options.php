<?php
$aLang = array(
    'charset' => 'UTF-8',
    'SHOP_MODULE_GROUP_relevanz_settings' => 'releva.nz Settings',
    'SHOP_MODULE_sRelevanzApiKey' => '<span style="float:left">Api Key</span><span style="float:right">Not yet registered? <a href="https://releva.nz" target="blank">Now catch up.</a></span><div style="clear:both"></div>',
    'SHOP_MODULE_GROUP_relevanz_retargeting' => 'releva.nz Retargeting',
    'SHOP_MODULE_blRetargetingEnabled' => 'Retargeting active',
    'HELP_SHOP_MODULE_blRetargetingEnabled' => '
        Um Kompatibilität mit unterschiedlichen Cookie-Consent-Managern zu gewährleisten, ist es notwendig unter "releva.nz Einstellungen -> Alternatives Cookie Consent HTML" ein Javascript zu konfigurieren welches Cookies zulässt.<br>
        Als Default-Wert sind unsere Cookies immer aktiv.
    ',
    'SHOP_MODULE_sAlternativeCookieCheck' => 'Alternative cookie consent HTML (Expert-Setting)',
    'HELP_SHOP_MODULE_sAlternativeCookieCheck' => '
        <strong>Beispiele:</strong>
        <dl>
            <dt>releva.nz Cookies immer zulassen:</dt>
            <dd><textarea readonly style=\"width:100%\">var relevanzRetargetingForcePixel = true;</textarea></dd>
        </dl>
        <dl>
            <dt>releva.nz-Logo anzeigen welches nach klicken releva.nz Cookies zulässt:</dt>
            <dd><textarea readonly style=\"width:100%\">(function(){\r\n    var img = document.createElement(\"img\");\r\n    img.setAttribute(\"src\", \"/modules/relevanz/retargeting/out/pictures/relevanz-logo.png\");\r\n    img.setAttribute(\"style\", \"width:5em;position:fixed;bottom:1em;left:1em;z-index:99999;\");\r\n    img.setAttribute(\"onclick\", \"relevanzRetargetingForcePixel = true; this.remove();\");\r\n    document.getElementsByTagName(\"body\")[0].append(img);\r\n})();</textarea></dd>
        </dl>
    ',
);