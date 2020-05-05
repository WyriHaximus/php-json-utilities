<?php declare(strict_types=1);

namespace WyriHaximus\Tests;

use PHPUnit\Framework\TestCase;
use function WyriHaximus\validate_array;

final class ValidateArrayTest extends TestCase
{
    public function testSuccess(): void
    {
        $fields = ['key'];

        $data = ['key' => 'value'];

        self::assertTrue(validate_array($data, $fields));
    }

    public function testSuccessWithTypes(): void
    {
        $fields = ['key' => 'string'];

        $data = ['key' => 'value'];

        self::assertTrue(validate_array($data, $fields));
    }

    public function testSuccessWithArrayOfTypes(): void
    {
        $fields = ['key' => ['string', 'integer']];

        $data = ['key' => 'value'];

        self::assertTrue(validate_array($data, $fields));
    }

    public function testFailure(): void
    {
        $fields = ['key'];

        $data = [];

        self::assertFalse(validate_array($data, $fields));
    }

    public function testFailureException(): void
    {
        self::expectException(TestException::class);
        self::expectExceptionMessage('"[]" is not an beer, missing ingredient "water"');

        $fields = ['water'];

        $data = [];

        self::assertFalse(validate_array($data, $fields, TestException::class));
    }
}
