<?php declare(strict_types=1);

namespace VanCodX\CodingStyle\PhpCsFixer;

use PhpCsFixer\Config;
use VanCodX\CodingStyle\PhpCsFixer\Fixers\NoTrailingCommaInMultilineFixer;

class ConfigCreator
{
    public static function create(): Config
    {
        $config = new Config();
        $config->registerCustomFixers([new NoTrailingCommaInMultilineFixer()]);
        $config->setRules(RuleSet::getRules());
        $config->setRiskyAllowed(true);
        return $config;
    }
}
