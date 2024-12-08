<?php declare(strict_types=1);

namespace VanCodX\CodingStyle\PhpCsFixer;

use PhpCsFixer\Config;

class ConfigCreator
{
    /**
     * @return Config
     */
    public static function create(): Config
    {
        $config = new Config();
        $config->setRules(RuleSet::getRules());
        $config->setRiskyAllowed(true);
        return $config;
    }
}
