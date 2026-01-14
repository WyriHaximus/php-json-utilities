<?php

declare(strict_types=1);

namespace WyriHaximus\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

use function WyriHaximus\validate_array;

final class ValidateArrayTest extends TestCase
{
    #[Test]
    public function success(): void
    {
        $fields = ['key'];

        $data = ['key' => 'value'];

        self::assertTrue(validate_array($data, $fields));
    }

    #[Test]
    public function successWithTypes(): void
    {
        $fields = ['key' => 'string'];

        $data = ['key' => 'value'];

        self::assertTrue(validate_array($data, $fields));
    }

    #[Test]
    public function successWithArrayOfTypes(): void
    {
        $fields = ['key' => ['string', 'integer']];

        $data = ['key' => 'value'];

        self::assertTrue(validate_array($data, $fields));
    }

    #[Test]
    public function failure(): void
    {
        $fields = ['key'];

        $data = [];

        self::assertFalse(validate_array($data, $fields));
    }

    #[Test]
    public function failureException(): void
    {
        self::expectException(TestException::class);
        self::expectExceptionMessage('"[]" is not an beer, missing ingredient "water"');

        $fields = ['water'];

        $data = [];

        self::assertFalse(validate_array($data, $fields, TestException::class));
    }
}
