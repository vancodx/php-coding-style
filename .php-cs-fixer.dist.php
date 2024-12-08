<?php

use VanCodX\CodingStyle\PhpCsFixer\ConfigCreator;
use PhpCsFixer\Finder;

$finder = (new Finder())->in(__DIR__);

return ConfigCreator::create()->setFinder($finder);
