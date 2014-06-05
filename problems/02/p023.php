<?php

/**
 * Non-abundant sums
 * Problem 23
 *
 * A perfect number is a number for which the sum of its proper divisors is exactly equal to the number.
 * For example, the sum of the proper divisors of 28 would be 1 + 2 + 4 + 7 + 14 = 28, which means that 28
 * is a perfect number.
 *
 * A number n is called deficient if the sum of its proper divisors is less than n and it is called abundant
 * if this sum exceeds n.
 *
 * As 12 is the smallest abundant number, 1 + 2 + 3 + 4 + 6 = 16, the smallest number that can be written
 * as the sum of two abundant numbers is 24. By mathematical analysis, it can be shown that all integers
 * greater than 28123 can be written as the sum of two abundant numbers. However, this upper limit cannot
 * be reduced any further by analysis even though it is known that the greatest number that cannot be expressed
 * as the sum of two abundant numbers is less than this limit.
 *
 * Find the sum of all the positive integers which cannot be written as the sum of two abundant numbers.
 */

$max = 28123;

$file = __DIR__.'/../../resources/abundants.json';

$abundants = json_decode(file_get_contents($file));
if (count($abundants) < 6965) // this is the number of abundant numbers below 28123
{
    $pn = new \Math\PerfectNumber();
    $abundants = $pn->findAbundantNumbersUpTo($max);
    file_put_contents($file, json_encode($abundants));
}

// just add everything to everything and see what's left
$size = count($abundants);
$sumInts = array();
for ($i=0; $i<$size; $i++)
{
    for ($j=$i; $j<$size; $j++)
    {
        $sum = $abundants[$i] + $abundants[$j];

        // go to next $i as soon as $i + $j exceeds our max, because any more $j's will never be less :)
        if ($sum > $max)
            continue(2);

        $sumInts[$sum] = 1;
    }
}
$sumInts = array_keys($sumInts);
sort($sumInts);
//print_r($sumInts);

$noSumInts = array_values(array_diff(range(1, $max), $sumInts)); // this creates 4 arrays, but is probably fast

//print_r($noSumInts);

echo "The solution is: " . array_sum($noSumInts).PHP_EOL;
