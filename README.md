VanCodX PHP Coding Style
========================

Installation
------------

Install this package with the following command:

```
composer require --dev vancodx/php-coding-style
```

Create ".php-cs-fixer.dist.php" file in the root directory of your project with the following contents:

```
<?php

use VanCodX\CodingStyle\PhpCsFixer\ConfigCreator;
use PhpCsFixer\Finder;

$finder = (new Finder())->in(__DIR__);

return ConfigCreator::create()->setFinder($finder);
```

Add the following lines into "composer.json" file of your project.

```
  "scripts": {
    "test": [
      "php-cs-fixer fix"
    ]
  }
```

Add ".php-cs-fixer.php" and '.php-cs-fixer.cache' into your ".gitignore" file.

Usage
-----

Use the following command:

```
composer test
```
