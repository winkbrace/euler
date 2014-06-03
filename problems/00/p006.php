<?php

/**
 * Sum square difference
 * Problem 6
 *
 * The sum of the squares of the first ten natural numbers is,
 * 1^2 + 2^2 + ... + 10^2 = 385
 *
 * The square of the sum of the first ten natural numbers is,
 * (1 + 2 + ... + 10)^2 = 552 = 3025
 *
 * Hence the difference between the sum of the squares of the first ten natural numbers and the square of the sum is 3025 − 385 = 2640.
 *
 * Find the difference between the sum of the squares of the first one hundred natural numbers and the square of the sum.
 */

$sumOfSquares = gmp_init(0);
for ($x=1; $x<=100; $x++)
{
    $square = gmp_pow(gmp_init($x), 2);
    $sumOfSquares = gmp_add($sumOfSquares, $square);
}

$sum = gmp_init(array_sum(range(1, 100)));
$squareOfSum = gmp_pow($sum, 2);

$diff = gmp_sub($squareOfSum, $sumOfSquares);

echo gmp_strval($diff);