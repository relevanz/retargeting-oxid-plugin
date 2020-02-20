## Installation

via composer (local repository):
    add following code to composer.json of your oxid-6 installation
        "repositories": [
            {
                "type": "path",
                "url": "path/to/oxid-6-releva.nz/RelevanzTracking",
                "options": {
                    "symlink": false
                }
            }
        ],

execute in shell in root-folder of your oxid-z installation:
    $ composer require relevanz/tracking-oxid

