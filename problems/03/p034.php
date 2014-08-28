<?php

/**
 * Digit factorials
 * Problem 34
 *
 * 145 is a curious number, as 1! + 4! + 5! = 1 + 24 + 120 = 145.
 *
 * Find the sum of all numbers which are equal to the sum of the factorial of their digits.
 *
 * Note: as 1! = 1 and 2! = 2 are not sums they are not included.
 *
 * Answer: 40730
 */

$c = new \Math\Combinatorics();

// collect factorials in array for speed
$facts = array();
for ($i=0; $i<=9; $i++)
    $facts[$i] = $c->fact($i);

// determine upperbound: 9! = 362880 => 7 times 9! is less than 9999999.

$results = array();

for ($i=10; $i<=9999999; $i++)
{
    $sum = 0;
    foreach(str_split($i) as $d)
        $sum += $facts[$d];

    if ($i == $sum)
        $results[] = $i;

    if ($i % 100000 == 0)
        echo PHP_EOL."$i checked so far..";
}

print_r($results);
echo PHP_EOL.array_sum($results);