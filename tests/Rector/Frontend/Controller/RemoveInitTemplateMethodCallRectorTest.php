<?php

declare(strict_types=1);

namespace Ssch\TYPO3Rector\Tests\Rector\Frontend\Controller;

use Iterator;
use Ssch\TYPO3Rector\Tests\AbstractRectorWithConfigTestCase;

final class RemoveInitTemplateMethodCallRectorTest extends AbstractRectorWithConfigTestCase
{
    /**
     * @dataProvider provideDataForTest()
     */
    public function test(string $file): void
    {
        $this->doTestFile($file);
    }

    public function provideDataForTest(): Iterator
    {
        yield [__DIR__ . '/Fixture/remove_init_template_from_tsfe.php.inc'];
    }
}
