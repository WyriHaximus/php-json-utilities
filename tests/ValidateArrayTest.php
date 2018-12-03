<?php declare(strict_types=1);

namespace WyriHaximus\Tests;

use PHPUnit\Framework\TestCase;
use WyriHaximus;

/**
 * @internal
 */
final class ValidateArrayTest extends TestCase
{
    public function testSuccess(): void
    {
        $fields = [
            'key',
        ];

        $data = [
            'key' => 'value',
        ];

        self::assertTrue(WyriHaximus\validate_array($data, $fields));
    }

    public function testFailure(): void
    {
        $fields = [
            'key',
        ];

        $data = [];

        self::assertFalse(WyriHaximus\validate_array($data, $fields));
    }

    /**
     * @expectedException WyriHaximus\Tests\TestException
     * @expectedExceptionMessage "[]" is not an beer, missing ingredient "water"
     */
    public function testFailureException(): void
    {
        $fields = [
            'water',
        ];

        $data = [];

        self::assertFalse(WyriHaximus\validate_array($data, $fields, TestException::class));
    }
}
