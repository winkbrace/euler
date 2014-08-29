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