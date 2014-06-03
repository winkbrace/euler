<?php

/**
 * Summation of primes
 * Problem 10
 *
 * The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.
 *
 * Find the sum of all the primes below two million.
 */

$prime = new \Math\Prime();
$sum = array_sum($prime->getPrimes());
$count = 0;
for ($i = $prime::MAX_IN_FILE + 2; $i < 2000000; $i+=2)
{
    if ($prime->isPrime($i))
    {
        // show progress every 100th found prime to not waste too much time
        if (++$count % 100 == 0)
            echo "$i => $sum".PHP_EOL;

        $sum += $i;
    }

}
echo $sum;