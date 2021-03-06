<?php
/**
 * Pentagon numbers
 * Problem 44
 *
 * Pentagonal numbers are generated by the formula, Pn=n(3n−1)/2. The first ten pentagonal numbers are:
 *
 * 1, 5, 12, 22, 35, 51, 70, 92, 117, 145, ...
 *
 * It can be seen that P4 + P7 = 22 + 70 = 92 = P8. However, their difference, 70 − 22 = 48, is not pentagonal.
 *
 * Find the pair of pentagonal numbers, Pj and Pk, for which their sum and difference are pentagonal and
 * D = |Pk − Pj| is minimised; what is the value of D?
 *
 * Answer: 5482660 (k=2167, j=1020, pk=7042750, pj=1560090)
 */
$log = new \Util\Log();
$pen = new \Sequence\Pentagonal();

$seq = $pen->createSequenceOfLength(10000);

$found = array();
$count = 0;
foreach ($seq as $k => $pk)
{
    foreach ($seq as $j => $pj)
    {
        $sum = $pk + $pj;
        if (! $pen->isPentagonal($sum))
            continue;

        $diff = $pk - $pj;
        if (! $pen->isPentagonal($diff))
            continue;

        $found[] = compact('k', 'j', 'pk', 'pj');
        break 2; // after running it for 10k * 10k = 100M cases, I found only 1
    }
    $count += count($seq);
    if ($count % 100000 == 0)
        $log->log("$count numbers checked. ".count($found)." found so far.");
}

print_r($found);

$log->solution(abs($found[0]['pk'] - $found[0]['pj']));
