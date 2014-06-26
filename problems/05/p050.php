<?php
/**
 * Consecutive prime sum
 * Problem 50
 *
 * The prime 41, can be written as the sum of six consecutive primes:
 * 41 = 2 + 3 + 5 + 7 + 11 + 13
 *
 * This is the longest sum of consecutive primes that adds to a prime below one-hundred.
 *
 * The longest sum of consecutive primes below one-thousand that adds to a prime,
 * contains 21 terms, and is equal to 953.
 *
 * Which prime, below one-million, can be written as the sum of the most consecutive primes?
 *
 * Answer: 997651 (the range runs from 7 to 3931 and is 543 long)
 */
$log = new \Util\Log();
$prime = \Math\Prime::getInstance();

$found = array();

$primes = $prime->getPrimesTo(1000000);
foreach ($primes as $i => $a)
{
    $sum = 0;
    $sequence = array();

    // create sequence of primes until the sum exceeds 1M
    for ($j=$i; $j<count($primes); $j++)
    {
        if ($sum + $primes[$j] >= 1000000)
            break;

        $sequence[] = $primes[$j];
        $sum += $primes[$j];
    }

    // then cut off the last prime until we have a prime sum
    while ((! $prime->isPrime($sum)) && count($sequence) > 0)
        $sum -= array_pop($sequence);

    // store the sequence with as key the length
    $found[count($sequence)]['seq'] = $sequence;
    $found[count($sequence)]['sum'] = $sum;
}

ksort($found);
//print_r(array_keys($found));

$best = array_pop($found);
$log->log(implode(',', $best['seq']));
$log->log("the range runs from ".$best['seq'][0].' to '.end($best['seq']).' and is '.count($best['seq']).' long');
$log->solution($best['sum']);