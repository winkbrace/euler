<?php
/**
 * Distinct primes factors
 * Problem 47
 *
 * The first two consecutive numbers to have two distinct prime factors are:
 *
 * 14 = 2 × 7
 * 15 = 3 × 5
 *
 * The first three consecutive numbers to have three distinct prime factors are:
 *
 * 644 = 2² × 7 × 23
 * 645 = 3 × 5 × 43
 * 646 = 2 × 17 × 19.
 *
 * Find the first four consecutive integers to have four distinct prime factors.
 * What is the first of these numbers?
 *
 * Answer: 134043
 */
$log = new \Util\Log();
$factor = new \Math\Factor();

$primeFactors = array();
for ($x=1000; $x<=999999; $x++)
{
    if ($x % 10000 == 0)
        $log->log("$x numbers checked so far");

    for ($i=0; $i<4; $i++)
    {
        $id = $x + $i;
        $primeFactors[$id] = $factor->getPrimeFactors($id);
        if (count($primeFactors[$id]) != 4) {
            $x = $id;
            $primeFactors = array();
            continue 2;
        }
    }
    break;
}

print_r($primeFactors);

$log->solution($x);