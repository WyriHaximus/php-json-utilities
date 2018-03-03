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

    /**
     * @expectedException WyriHaximus\Tests\TestException
     * @expectedExceptionMessage "[]" is not an beer, missing ingredient "water"
     */
    public function testFailureException()
    {
        $fields = [
            'water',
        ];

        $data = [];

        self::assertFalse(WyriHaximus\validate_array($data, $fields, TestException::class));
    }
}
