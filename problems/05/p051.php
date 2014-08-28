<?php
/**
 * Prime digit replacements
 * Problem 51
 *
 * By replacing the 1st digit of the 2-digit number *3, it turns out that six of the nine possible values:
 * 13, 23, 43, 53, 73, and 83, are all prime.
 *
 * By replacing the 3rd and 4th digits of 56**3 with the same digit, this 5-digit number is the first example
 * having seven primes among the ten generated numbers, yielding the family:
 * 56003, 56113, 56333, 56443, 56663, 56773, and 56993. Consequently 56003, being the first member of this family,
 * is the smallest prime with this property.
 *
 * Find the smallest prime which, by replacing part of the number (not necessarily adjacent digits) with the
 * same digit, is part of an eight prime value family.
 *
 * The answer is: 121313
 */

$log = new \Util\Log();
$prime = \Math\Prime::getInstance();

foreach ($prime->getPrimes() as $count => $n)
{
    for ($i=0; $i<strlen($n); $i++)
    {
        $foundSingles = array();
        $foundMultiples = array();
        for ($x=0; $x<=9; $x++)
        {
            $a = substr_replace($n, $x, $i, 1);
            if ($prime->isPrime($a))
                $foundSingles[] = $a;

            $c = substr($n, $i, 1);
            if (substr_count($n, $c) > 1)
            {
                $a = str_replace($c, $x, $n);
                if ($prime->isPrime($a))
                    $foundMultiples[] = $a;
            }
        }
        if (count($foundSingles) >= 8)
        {
            print_r($foundSingles);
            break 2;
        }
        if (count($foundMultiples) >= 8)
        {
            print_r($foundMultiples);
            break 2;
        }
    }

    if ($count % 1000 == 0)
        $log->log($count . " primes processed so far. Currently at " . $n);
}

$log->solution(min($foundMultiples));
