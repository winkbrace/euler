<?php
/**
 * A googol (10^100) is a massive number: one followed by one-hundred zeros; 100^100 is almost unimaginably
 * large: one followed by two-hundred zeros. Despite their size, the sum of the digits in each number is only 1.
 *
 * Considering natural numbers of the form, a^b, where a, b < 100, what is the maximum digital sum?
 */
$log = new \Util\Log();
$sum = new \Math\Sum();

$sums = [];
for ($a = 1; $a <= 100; $a++)
{
    for ($b = 1; $b <= 100; $b++)
    {
        $sums[$sum->getSumOfDigits(gmp_strval(gmp_pow($a, $b)))] = ['a' => $a, 'b' => $b];
    }
}

krsort($sums);
print_r(reset($sums));
$log->solution(key($sums));