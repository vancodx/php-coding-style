<?php declare(strict_types=1);

namespace VanCodX\CodingStyle\PhpCsFixer\Fixers;

use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\FixerDefinition\CodeSample;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\CT;
use PhpCsFixer\Tokenizer\Tokens;
use SplFileInfo;

/**
 * @see \PhpCsFixer\Fixer\Basic\NoTrailingCommaInSinglelineFixer
 */
class NoTrailingCommaInMultilineFixer implements FixerInterface
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'VanCodX/no_trailing_comma_in_multiline';
    }

    /**
     * @return FixerDefinitionInterface
     */
    public function getDefinition(): FixerDefinitionInterface
    {
        return new FixerDefinition(
            'A multi-line list of values separated by a comma MUST NOT have a trailing comma.',
            [new CodeSample("<?php\n\$foo = [\n    1,\n    2,\n];\n")]
        );
    }

    /**
     * @return bool
     */
    public function isRisky(): bool
    {
        return false;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return 0;
    }

    /**
     * @param SplFileInfo $file
     * @return bool
     */
    public function supports(SplFileInfo $file): bool
    {
        return ($file->getExtension() === 'php');
    }

    /**
     * @param Tokens $tokens
     * @return bool
     */
    public function isCandidate(Tokens $tokens): bool
    {
        return $tokens->isTokenKindFound(',')
            && $tokens->isAnyTokenKindsFound([
                ')',
                CT::T_ARRAY_SQUARE_BRACE_CLOSE,
                CT::T_DESTRUCTURING_SQUARE_BRACE_CLOSE,
                CT::T_GROUP_IMPORT_BRACE_CLOSE
            ]);
    }

    /**
     * @param SplFileInfo $file
     * @param Tokens $tokens
     * @return void
     */
    public function fix(SplFileInfo $file, Tokens $tokens): void
    {
        for ($index = $tokens->count() - 1; $index >= 0; --$index) {
            if (
                !$tokens[$index]->equals(')')
                && !$tokens[$index]->isGivenKind([
                    CT::T_ARRAY_SQUARE_BRACE_CLOSE,
                    CT::T_DESTRUCTURING_SQUARE_BRACE_CLOSE,
                    CT::T_GROUP_IMPORT_BRACE_CLOSE
                ])
            ) {
                continue;
            }

            $commaIndex = $tokens->getPrevMeaningfulToken($index);

            if (!$tokens[$commaIndex]->equals(',')) {
                continue;
            }

            $block = Tokens::detectBlockType($tokens[$index]);
            $blockOpenIndex = $tokens->findBlockStart($block['type'], $index);

            if (!$tokens->isPartialCodeMultiline($blockOpenIndex, $index)) {
                continue;
            }

            do {
                $tokens->clearTokenAndMergeSurroundingWhitespace($commaIndex);
                $commaIndex = $tokens->getPrevMeaningfulToken($commaIndex);
            } while ($tokens[$commaIndex]->equals(','));
        }
    }
}
