## Installation

@todo see https://oxidforge.org/de/downloads

https://oxidforge.org/de/oxid6-module-2-zip-archive-mit-composer-installieren.html

https://docs.oxid-esales.com/developer/en/6.1/modules/best_practices/module_setup.html

https://forum.oxid-esales.com/t/module-update-with-composer-postupdate-script/96238/3

Add the following section to the `composer.json` of your oxid-6 shop:
```
        "repositories": [
            {
                "type": "git",
                "url": "https://github.com/relevanz/retargeting-oxid-plugin"
            }
        ],
```

Execute the following command in the root-folder of your oxid-6 installation:
```
$ composer require relevanz/retargeting-oxid-plugin
```