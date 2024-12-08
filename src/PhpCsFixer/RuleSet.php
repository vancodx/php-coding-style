<?php

declare(strict_types=1);

namespace VanCodX\CodingStyle\PhpCsFixer;

class RuleSet
{
    /**
     * @return array<string, mixed>
     */
    public static function getRules(): array
    {
        return [
            '@PSR12' => true
        ];
    }
}
