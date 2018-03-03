<?php

namespace WyriHaximus\Tests;

use Exception;

final class TestException extends Exception
{
    public function __construct($json, $field)
    {
        parent::__construct('"' . json_encode($json) . '" is not an beer, missing ingredient "' . $field . '"');
    }
}
