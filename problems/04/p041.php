<?php
/**
 * Pandigital prime
 * Problem 41
 *
 * We shall say that an n-digit number is pandigital if it makes use of all the digits 1 to n exactly once. For example, 2143 is a 4-digit pandigital and is also prime.
 *
 * What is the largest n-digit pandigital prime that exists?
 *
 * Solution: 7652413
 */

$log = new \Util\Log();

$prime = \Math\Prime::getInstance();
$com = new \Math\Combinatorics();

$panPrimes = array(); // for IDE

// get all combinations of 1 through n and check if they are prime
for ($i=9; $i>0; $i--)
{
    $pool = '123456789';
    $perms = $com->createPermutations(substr($pool, 0, $i));
    $log->log('there are '.count($perms).' permutations of '.$i.' digits');

    $panPrimes = array();
    foreach ($perms as $n)
    {
        if ($prime->isPrime($n))
            $panPrimes[] = $n;
    }

    $log->log('there are '.count($panPrimes).' pandigital primes of '.$i.' digits');
    if (count($panPrimes) > 0)
        break;
}
$log->solution(max($panPrimes));