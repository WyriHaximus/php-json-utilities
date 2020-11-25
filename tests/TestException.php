<?php

declare(strict_types=1);

namespace WyriHaximus\Tests;

use Exception;

use function Safe\json_encode;

final class TestException extends Exception
{
    /**
     * @param mixed $json
     */
    public function __construct($json, string $field)
    {
        parent::__construct('"' . json_encode($json) . '" is not an beer, missing ingredient "' . $field . '"');
    }
}
