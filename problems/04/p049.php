<?php
/**
 * Prime permutations
 * Problem 49
 *
 * The arithmetic sequence, 1487, 4817, 8147, in which each of the terms increases by 3330, is unusual
 * in two ways: (i) each of the three terms are prime, and, (ii) each of the 4-digit numbers are permutations
 * of one another.
 *
 * There are no arithmetic sequences made up of three 1-, 2-, or 3-digit primes, exhibiting this property,
 * but there is one other 4-digit increasing sequence.
 *
 * What 12-digit number do you form by concatenating the three terms in this sequence?
 */
$log = new \Util\Log();
$prime = \Math\Prime::getInstance();
$comb = new \Math\Combination();

$collection = array();
foreach ($prime->getPrimesTo(10000) as $n)
{
    if ($n < 1000)
        continue;

    $perms = $comb->createPermutations($n);
    foreach ($perms as $i => $x)
    {
        if (! $prime->isPrime($x))
            unset($perms[$i]);
    }
    sort($perms);

    if (count($perms) >= 3 && empty($collection[$perms[0]]))
        $collection[$n] = $perms;
}

print_r($collection);
$log->log(count($collection).' possible permutatable primes found');