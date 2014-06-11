<?php
/**
 * Pandigital multiples
 * Problem 38
 *
 * Take the number 192 and multiply it by each of 1, 2, and 3:
 *
 * 192 × 1 = 192
 * 192 × 2 = 384
 * 192 × 3 = 576
 *
 * By concatenating each product we get the 1 to 9 pandigital, 192384576. We will call 192384576 the concatenated
 * product of 192 and (1,2,3)
 *
 * The same can be achieved by starting with 9 and multiplying by 1, 2, 3, 4, and 5, giving the pandigital,
 * 918273645, which is the concatenated product of 9 and (1,2,3,4,5).
 *
 * What is the largest 1 to 9 pandigital 9-digit number that can be formed as the concatenated product of an
 * integer with (1,2, ... , n) where n > 1?
 *
 * Answer: 932718654
 */

$pan = new \String\Pandigital();
$log = new \Util\Log();

// I assume it's going to be a 3 digit number, so not much possibilities.
$results = array();
for ($i=25; $i<=33; $i++)
{
    $n = $i . (2 * $i) . (3 * $i) . (4 * $i);
    if ($pan->isPandigital($n))
        $results[$i] = $n;
}
for ($i=100; $i<=333; $i++)
{
    $n = $i . (2 * $i) . (3 * $i);
    if ($pan->isPandigital($n))
        $results[$i] = $n;
}
for ($i=5000; $i<10000; $i++)
{
    $n = $i . (2 * $i);
    if ($pan->isPandigital($n))
        $results[$i] = $n;
}

print_r($results);
$log->solution(max($results));