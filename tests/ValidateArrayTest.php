<?php

namespace WyriHaximus\Tests;

use PHPUnit\Framework\TestCase;
use WyriHaximus;

final class ValidateArrayTest extends TestCase
{
    public function testSuccess()
    {
        $fields = [
            'key',
        ];

        $data = [
            'key' => 'value',
        ];

        self::assertTrue(WyriHaximus\validate_array($data, $fields));
    }

    public function testFailure()
    {
        $fields = [
            'key',
        ];

        $data = [];

        self::assertFalse(WyriHaximus\validate_array($data, $fields));
    }

    public function testFailureException()
    {
        self::expectException(TestException::class);
        self::expectExceptionMessage('"[]" is not an beer, missing ingredient "water"');

        $fields = [
            'water',
        ];

        $data = [];

        self::assertFalse(WyriHaximus\validate_array($data, $fields, TestException::class));
    }
}
