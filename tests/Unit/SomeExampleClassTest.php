<?php declare(strict_types = 1);

namespace FreshP\ExampleTestPhpCoreMethods\Tests\Unit;

use FreshP\ExampleTestPhpCoreMethods\SomeExampleClass;
use FreshP\ExampleTestPhpCoreMethods\Tests\Fixtures\Data\PhpCoreMethodFixture;
use PHPUnit\Framework\TestCase;

final class SomeExampleClassTest extends TestCase
{
    public function testOutputCheckForExistingFileAndDirectoryDefault()
    {
        $this->markTestSkipped('will fail because there is no way to get the correct date-string');

        $result = (new SomeExampleClass)->createOutput();

        // problems will occur if there will be long running tasks
        sleep(1);

        $this->assertEquals(
            sprintf(
                'test %s %s',
                sprintf(SomeExampleClass::FILE_EXISTS_MESSAGE, date('Y-m-d H:i:s')),
                sprintf(SomeExampleClass::IS_DIR_MESSAGE, date('Y-m-d H:i:s')),
            ),
            $result
        );
    }

    public function testOutputCheckForExistingFileAndDirectory()
    {
        $firstDateResponse = '2019-11-25 15:15:15';
        $secondDateResponse = '2019-11-26 15:15:15';
        PhpCoreMethodFixture::setReturnValuesForCoreFunctions([
            'date' => [
                $firstDateResponse,
                $secondDateResponse,
            ],
        ]);

        $result = (new SomeExampleClass)->createOutput();

        // problems will occur if there will be long running tasks
        sleep(1);

        $this->assertEquals(
            sprintf(
                'test %s %s',
                sprintf(SomeExampleClass::FILE_EXISTS_MESSAGE, $firstDateResponse),
                sprintf(SomeExampleClass::IS_DIR_MESSAGE, $secondDateResponse),
            ),
            $result
        );
    }

    public function testOutputCheckForNonExistingFileAndExistingDirectory()
    {
        $dateResponse = '2019-11-25 15:15:15';
        PhpCoreMethodFixture::setReturnValuesForCoreFunctions([
            'date' => $dateResponse,
            'file_exists' => false,
            'is_dir' => true,
        ]);

        $result = (new SomeExampleClass)->createOutput();
        $this->assertEquals(
            sprintf(
                'test test %s',
                sprintf(SomeExampleClass::IS_DIR_MESSAGE, $dateResponse)
            ), $result);
    }

    public function testOutputCheckForExistingFileAndNonExistingDirectory()
    {
        $dateResponse = '2019-11-25 15:15:15';
        PhpCoreMethodFixture::setReturnValuesForCoreFunctions([
            'date' => $dateResponse,
            'file_exists' => true,
            'is_dir' => false,
        ]);

        $result = (new SomeExampleClass)->createOutput();
        $this->assertEquals(
            sprintf(
                'test %s test',
                sprintf(SomeExampleClass::FILE_EXISTS_MESSAGE, $dateResponse)
            ), $result);
    }

    public function testOutputCheckForNonExistingFileAndNoDirectory()
    {
        PhpCoreMethodFixture::setReturnValuesForCoreFunctions([
            'file_exists' => false,
            'is_dir' => false,
        ]);

        $result = (new SomeExampleClass)->createOutput();
        $this->assertEquals('test test test', $result);
    }
}
