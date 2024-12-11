VanCodX PHP Coding Style
========================

Installation
------------

Install this package with the following command:

```
composer require --dev vancodx/php-coding-style
```

Create ".php-cs-fixer.dist.php" file in the root directory of your project with the following contents:

```php
<?php declare(strict_types=1);

use VanCodX\CodingStyle\PhpCsFixer\ConfigCreator;

$config = ConfigCreator::create();
$config->getFinder()->in(__DIR__);
return $config;
```

Create ".phpcs.xml.dist" file in the root directory of your project with the following contents:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<ruleset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="vendor/squizlabs/php_codesniffer/phpcs.xsd"
         name="Custom Rule Set">

    <file>.</file>
    <exclude-pattern>*/vendor/*</exclude-pattern>
    <arg name="extensions" value="php"/>

    <rule ref="vendor/vancodx/php-coding-style/phpcs-ruleset"/>

</ruleset>
```

Add the following lines into "composer.json" file of your project:

```json
{
  "scripts": {
    "test": [
      "php-cs-fixer fix",
      "phpcs -p"
    ]
  }
}
```

Add the following lines into your ".gitignore" file:

```
.php-cs-fixer.cache
.php-cs-fixer.php
.phpcs.xml
```

Usage
-----

Use the following command:

```
composer test
```
