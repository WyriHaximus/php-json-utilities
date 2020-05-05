<?php declare(strict_types=1);

namespace WyriHaximus;

use function array_filter;
use function array_key_exists;
use function array_keys;
use function assert;
use function count;
use function gettype;
use function in_array;
use function is_array;
use function is_string;

/**
 * @param array<string, mixed>                                   $data
 * @param array<string, string|array<string>>|array<int, string> $fields
 */
function validate_array(array $data, array $fields, ?string $exception = null): bool
{
    $isInt = count(array_filter(array_keys($fields), 'is_int')) === count($fields);

    foreach ($fields as $field => $type) {
        if ($isInt) {
            $field = $type;
            assert(is_string($field));
        }

        /** @psalm-suppress PossiblyInvalidArrayOffset */
        if ((! isset($data[$field]) && // This is faster,
                // but it will also return false on fields which
                // value is null, so calling array_key_exists when that happens.
                ! array_key_exists($field, $data)) ||
            (
                ! $isInt && (
                    (
                        is_string($type) && gettype($data[$field]) !== $type
                    ) ||
                    (
                        is_array($type) && ! in_array(gettype($data[$field]), $type, true)
                    )
                )
            )
        ) {
            if ($exception === null) {
                return false;
            }

            /**
             * @psalm-suppress InvalidThrow
             * @psalm-suppress InvalidStringClass
             */
            throw new $exception($data, $field);
        }
    }

    return true;
}
