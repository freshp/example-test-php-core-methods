<?php declare(strict_types = 1);

namespace FreshP\ExampleTestPhpCoreMethods;

final class SomeExampleClass
{
    public const FILE_EXISTS_MESSAGE = 'append interesting data at %s';
    public const IS_DIR_MESSAGE = 'append another interesting data at %s';

    public function createOutput(): string
    {
        $example = 'test';

        $example .= ' ' . $this->appendTextDependingOnFileExists(__FILE__);
        $example .= ' ' . $this->appendTextDependingOnIsDir(__DIR__);

        return $example;
    }

    private function appendTextDependingOnFileExists(string $filepath): string
    {
        $text = 'test';
        if (true === file_exists($filepath)) {
            $text = sprintf(self::FILE_EXISTS_MESSAGE, date('Y-m-d H:i:s'));
        }

        return $text;
    }

    private function appendTextDependingOnIsDir(string $path): string
    {
        $text = 'test';
        if (true === is_dir($path)) {
            $text = sprintf(self::IS_DIR_MESSAGE, date('Y-m-d H:i:s'));
        }

        return $text;
    }
}
