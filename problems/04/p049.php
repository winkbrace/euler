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
 *
 * Answer: 296962999629 (amazingly enough the difference here is also 3330)
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
    $perms = array_unique($perms); // to eliminate duplicates due to same digits (e.g. 8999)

    if (count($perms) < 3)
        continue;

    foreach ($perms as $i => $x)
    {
        if (! $prime->isPrime($x))
            unset($perms[$i]);
    }
    sort($perms);

    if (count($perms) >= 3 && empty($collection[$perms[0]]))
        $collection[$n] = $perms;
}

$log->log(count($collection).' possible permutatable primes found');

$found = array();
foreach ($collection as $nrs)
{
    $diffs = \Util\ArrayHelper::getAllDifferences($nrs);
    foreach ($diffs as $d => $sets)
    {
        // there must be 2 differences and the high number of the first set must equal the low number of the last set
        if (count($sets) == 2 && $sets[0][1] == $sets[1][0])
            $found[] = [$sets[0][0], $sets[0][1], $sets[1][1]];
    }
}

print_r($found);

$log->solution(implode('', $found[1]));