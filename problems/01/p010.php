<?php

/**
 * Summation of primes
 * Problem 10
 *
 * The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.
 *
 * Find the sum of all the primes below two million.
 *
 * The solution is: 142913828922
 */
$log = new \Util\Log();
$prime = Math\Prime::getInstance('1M');
$sum = 0;
foreach ($prime->getPrimes() as $p) {
    if ($p >= 2000000)
        break;
    $sum += $p;
}

$log->solution($sum);