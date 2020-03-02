## Installation

@todo see https://oxidforge.org/de/downloads

https://oxidforge.org/de/oxid6-module-2-zip-archive-mit-composer-installieren.html
https://docs.oxid-esales.com/developer/en/6.1/modules/best_practices/module_setup.html
https://forum.oxid-esales.com/t/module-update-with-composer-postupdate-script/96238/3

via composer (local repository):
    add following code to composer.json of your oxid-6 installation
        "repositories": [
            {
                "type": "path",
                "url": "path/to/oxid-6-releva.nz/RelevanzRetargeting",
                "options": {
                    "symlink": false
                }
            }
        ],

execute in shell in root-folder of your oxid-z installation:
    $ composer require relevanz/retargeting-oxid-plugin

