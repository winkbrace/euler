<?php

use Math\Prime;
use Util\Log;

/**
 * Circular primes
 * Problem 35
 *
 * The number, 197, is called a circular prime because all rotations of the digits:
 * 197, 971, and 719, are themselves prime.
 *
 * There are thirteen such primes below 100: 2, 3, 5, 7, 11, 13, 17, 31, 37, 71, 73, 79, and 97.
 *
 * How many circular primes are there below one million?
 *
 * Answer: 55
 */

$p = Prime::getInstance();
$log = new Log();

// runs 7.7 secs
function search_by_list_of_primes(Prime $p, Log $log)
{
    $results = array();
    foreach ($p->getPrimesTo(1000000) as $i => $prime)
    {
        if (! empty($results[$prime]))
            continue;

        if ($p->isCircularPrime($prime))
        {
            foreach (\String\Rotation::getAllRotations($prime) as $n)
                $results[$n] = 1;
        }

        if ($i % 1000 == 0)
            $log->log(sprintf("%d numbers processed. We're at %d. %d circular primes found so far.", $i, $prime, count($results)));
    }
    return $results;
}

// another approach would be to create all possible numbers with 1,3,7 and 9
// runs 9.5 secs
function search_by_allowed_digits(Prime $p, Log $log)
{
    $allowed = array(1,3,7,9);

    $numbers = array(2, 3, 5, 7);

    foreach ($allowed as $a) {
        foreach ($allowed as $b) {
            foreach ($allowed as $c) {
                foreach ($allowed as $d) {
                    foreach ($allowed as $e) {
                        $numbers[] = $a.$b.$c.$d.$e;
                    }
                    $numbers[] = $a.$b.$c.$d;
                }
                $numbers[] = $a.$b.$c;
            }
            $numbers[] = $a.$b;
        }
    }

    sort($numbers);

    $log->log(count($numbers).' numbers to check');

    $results = array();
    foreach ($numbers as $n)
    {
        if ($p->isCircularPrime($n))
            $results[] = $n;
    }

    return $results;
}

$results = search_by_list_of_primes($p, $log);
print_r($results);
$log->solution(count($results));