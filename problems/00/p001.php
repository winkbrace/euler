<?php

/**
 * Multiples of 3 and 5
 * Problem 1
 * Published on Friday, 5th October 2001, 06:00 pm; Solved by 376056
 *
 * If we list all the natural numbers below 10 that are multiples of 3 or 5, we get 3, 5, 6 and 9.
 * The sum of these multiples is 23.
 *
 * Find the sum of all the multiples of 3 or 5 below 1000.
 */

$m = new \Math\Multiples();

// flip values to keys, so we can add and as a side effect the values become unique
$multiples = array_flip($m->getMultiplesTo(3, 999)) + array_flip($m->getMultiplesTo(5, 999));

echo array_sum(array_keys($multiples));