<?php
/**
 * find Nth occurrence of needle in haystack
 * @param string $haystack
 * @param string $needle
 * @param int $n
 * @return bool|int
 */
function strnpos($haystack, $needle, $n)
{
    if ($n == 1) {
        return strpos($haystack, $needle);
    } elseif ($n > 1) {
        return strpos($haystack, $needle, strnpos($haystack, $needle, $n - 1) + strlen($needle));
    } else {
        return error_log('Error: Value for parameter $number is out of range');
    }
}

/**
 * check if number is a gmp resource, else create it as one
 * @param mixed $n
 * @return resource
 */
function gmp($n)
{
    if (is_resource($n) && substr(get_resource_type($n), 0, 3) == 'GMP')
        return $n;
    else
        return gmp_init($n);
}