<?php declare(strict_types = 1);

namespace FreshP\ExampleTestPhpCoreMethods\Tests\Unit;

use FreshP\ExampleTestPhpCoreMethods\SomeExampleClass;
use PHPUnit\Framework\TestCase;

final class SomeExampleClassTest extends TestCase
{
    public function testOutputCheckForExistingFileAndDirectory()
    {
        $result = (new SomeExampleClass)->createOutput();

        $this->assertEquals(
            sprintf(
                'test %s %s',
                sprintf(SomeExampleClass::FILE_EXISTS_MESSAGE, date('Y-m-d H:i:s')),
                sprintf(SomeExampleClass::IS_DIR_MESSAGE, date('Y-m-d H:i:s')),
            ),
            $result
        );
    }
}
