<?php

/**
 * Power digit sum
 * Problem 16
 *
 * 2^15 = 32768 and the sum of its digits is 3 + 2 + 7 + 6 + 8 = 26.
 *
 * What is the sum of the digits of the number 2^1000?
 */

$s = new \Math\Sum();

$x = gmp_strval(gmp_pow(gmp_init(2), 1000));
echo "2^1000 = $x => sum of digits = " . $s->getSumOfDigits($x) . PHP_EOL;
