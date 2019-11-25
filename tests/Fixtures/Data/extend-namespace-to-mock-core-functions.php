<?php

namespace FreshP\ExampleTestPhpCoreMethods;

use FreshP\ExampleTestPhpCoreMethods\Tests\Fixtures\Data\PhpCoreMethodFixture;

function file_exists($filename): bool
{
    $fixture = PhpCoreMethodFixture::file_exists();
    if (null === $fixture) {
        return \file_exists($filename);
    }

    return $fixture($filename);
}

function is_dir($filename): bool
{
    $fixture = PhpCoreMethodFixture::is_dir();
    if (null === $fixture) {
        return \is_dir($filename);
    }

    return $fixture($filename);
}

function date($format, $timestamp = 'time()')
{
    $fixture = PhpCoreMethodFixture::date();
    if (null === $fixture) {
        return \date($format);
    }

    return $fixture($format);
}
