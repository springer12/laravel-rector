<?php

declare(strict_types=1);

namespace Ssch\TYPO3Rector\Rector\Extbase;

use Nette\Utils\Strings;
use PhpParser\Node;
use PhpParser\Node\Stmt\ClassMethod;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfo;
use Rector\Core\Rector\AbstractRector;
use Rector\Core\RectorDefinition\CodeSample;
use Rector\Core\RectorDefinition\RectorDefinition;

/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/9.5/Deprecation-85981-AnnotationFlushesCaches.html
 */
final class RemoveFlushCachesRector extends AbstractRector
{
    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        return [ClassMethod::class];
    }

    /**
     * @param ClassMethod $node
     */
    public function refactor(Node $node): ?Node
    {
        /** @var string $name */
        $name = $this->getName($node);
        if (! Strings::endsWith($name, 'Command')) {
            return null;
        }

        /** @var PhpDocInfo|null $phpDocInfo */
        $phpDocInfo = $node->getAttribute(PhpDocInfo::class);
        if (null === $phpDocInfo) {
            return null;
        }

        $phpDocInfo->removeByName('flushCaches');

        return $node;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDefinition(): RectorDefinition
    {
        return new RectorDefinition('Remove @flushesCaches annotation', [
            new CodeSample(
                <<<'CODE_SAMPLE'
/**
 * My command
 *
 * @flushesCaches
 */
public function myCommand()
{
}
CODE_SAMPLE
                    ,
                <<<'CODE_SAMPLE'
/**
 * My Command
 */
public function myCommand()
{
}

CODE_SAMPLE
            ),
        ]);
    }
}
