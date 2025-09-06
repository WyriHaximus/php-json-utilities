<?php

declare(strict_types=1);

namespace WyriHaximus\Tests;

use Exception;

use function json_encode;

final class TestException extends Exception
{
    public function __construct(mixed $json, string $field)
    {
        parent::__construct('"' . json_encode($json) . '" is not an beer, missing ingredient "' . $field . '"');
    }
}
