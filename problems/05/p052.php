<?php
/**
 * Permuted multiples
 * Problem 52
 *
 * It can be seen that the number, 125874, and its double, 251748, contain exactly the same digits,
 * but in a different order.
 *
 * Find the smallest positive integer, x, such that 2x, 3x, 4x, 5x, and 6x, contain the same digits.
 */

$log = new \Util\Log();
$sorter = new \String\Sorter();

// number has to start with 10, 11, 12 or 13. Otherwise 6x that would mean additional characters.
$n = 125874;
if ($sorter->compare($n, 2*$n))
    $log->solution($n);
