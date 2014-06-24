<?php
/**
 * Self powers
 * Problem 48
 *
 * The series, 1^1 + 2^2 + 3^3 + ... + 10^10 = 10405071317.
 *
 * Find the last ten digits of the series, 1^1 + 2^2 + 3^3 + ... + 1000^1000.
 *
 * Answer: 9110846700
 */
$log = new \Util\Log();

$sum = gmp_init(0);
for ($i=1; $i<=1000; $i++)
{
    $sum = gmp_add($sum, gmp_pow(gmp_init($i), $i));
}

$log->log("The complete sum is: ".gmp_strval($sum));
$log->solution(substr(gmp_strval($sum), -10));