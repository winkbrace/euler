<?php

/**
 * Reciprocal cycles
 * Problem 26
 *
 * A unit fraction contains 1 in the numerator. The decimal representation of the unit fractions with
 * denominators 2 to 10 are given:

1/2	= 	0.5
1/3	= 	0.(3)
1/4	= 	0.25
1/5	= 	0.2
1/6	= 	0.1(6)
1/7	= 	0.(142857)
1/8	= 	0.125
1/9	= 	0.(1)
1/10= 	0.1

 * Where 0.1(6) means 0.166666..., and has a 1-digit recurring cycle. It can be seen that 1/7 has a
 * 6-digit recurring cycle.
 * Find the value of d < 1000 for which 1/d contains the longest recurring cycle in its decimal fraction part.
 *
 * Answer: 983
 */

$fraction = new \Math\Fraction();
$prime = new \Math\Prime();

$max = 0;
foreach ($prime->getPrimesTo(1000) as $i)
{
    $n = $fraction->getFraction(1, $i, 1200);
    $cycle = $fraction->getRecurringCycle($n);
    $length = strlen($cycle);
    if ($length > $max)
    {
        $max = $length;
        echo "$i: $length".PHP_EOL;
    }
}

// lol.. you need only search the prime numbers and then it's always the number - 1.
// apparently these are "Full Reptend Primes"