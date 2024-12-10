<?php declare(strict_types=1);

namespace VanCodX\CodingStyle\PhpCsFixer;

class RuleSet
{
    /**
     * @return array<string, mixed>
     */
    public static function getRules(): array
    {
        return [
            '@PSR12' => true,
            'blank_line_after_opening_tag' => false,
            'declare_strict_types' => true,

            'ordered_imports' => ['imports_order' => ['class', 'function', 'const'], 'sort_algorithm' => 'alpha'],

            'array_syntax' => ['syntax' => 'short'],
            'no_trailing_comma_in_singleline' => true,
            'VanCodX/no_trailing_comma_in_multiline' => true,

            'statement_indentation' => ['stick_comment_to_next_continuous_control_statement' => true]
        ];
    }
}
