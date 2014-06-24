<?php
/**
 * Goldbach's other conjecture
 * Problem 46
 *
 * It was proposed by Christian Goldbach that every odd composite number can be written as the sum of a
 * prime and twice a square.
 *
 * 9 = 7 + 2×1^2
 * 15 = 7 + 2×2^2
 * 21 = 3 + 2×3^2
 * 25 = 7 + 2×3^2
 * 27 = 19 + 2×2^2
 * 33 = 31 + 2×1^2
 *
 * It turns out that the conjecture was false.
 *
 * What is the smallest odd composite that cannot be written as the sum of a prime and twice a square?
 *
 * Answer: 5777
 */

$log = new \Util\Log();
$comp = \Math\Composites::getInstance();
$prime = \Math\Prime::getInstance();
$square = new \Sequence\Square();

foreach ($comp->getCompositeNumbers() as $i => $n)
{
    if ($i % 1000 == 0)
        $log->log("$i numbers checked so far.");

    // skip even composites
    if ($n % 2 == 0)
        continue;

    foreach ($prime->getPrimes() as $p)
    {
        // if we get here, we have found an odd composite that cannot be written as a prime + twice a square
        if ($p > $n-2)
            break 2;

        $s = ($n - $p) / 2;
        if (\Util\Integer::isInteger($s) && $square->isSquare($s))
            continue 2;
    }
}

$log->solution($n);