<?php

declare(strict_types=1);

use Rector\Php81\Rector\FuncCall\NullToStrictStringFuncCallArgRector;
use WyriHaximus\TestUtilities\RectorConfig;

return RectorConfig::configure(dirname(__DIR__, 2))->withSkip([
    NullToStrictStringFuncCallArgRector::class,
]);
