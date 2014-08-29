<?php
/**
 * Permuted multiples
 * Problem 52
 *
 * It can be seen that the number, 125874, and its double, 251748, contain exactly the same digits,
 * but in a different order.
 *
 * Find the smallest positive integer, x, such that 2x, 3x, 4x, 5x, and 6x, contain the same digits.
 *
 * The solution is: 142857
 */

$log = new \Util\Log();
$sorter = new \String\Sorter();

// number has to start with 10, 11, 12, 13, 14, 15 or 16. Otherwise 6x that would mean additional characters.
$count = 0;
for ($n=100; $n<10000000; $n++)
{
    if (strlen(6*$n) > strlen($n))
        $n = (int) str_pad('1', strlen(6*$n), '0', STR_PAD_RIGHT);

    if ($sorter->compare($n, 2*$n, 3*$n, 4*$n, 5*$n, 6*$n))
        break;

    if (++$count % 10000 == 0)
        $log->log($count . " numbers checked so far. Currently at " . $n);
}

$log->solution($n);
