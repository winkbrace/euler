<?php

/**
 * Double-base palindromes
 * Problem 36
 *
 * The decimal number, 585 = 1001001001 (binary), is palindromic in both bases.
 *
 * Find the sum of all numbers, less than one million, which are palindromic in base 10 and base 2.
 *
 * (Please note that the palindromic number, in either base, may not include leading zeros.)
 *
 * Answer: 872187
 */

$pal = new \String\Palindrome();
$log = new \Util\Log();

// create array of palindrome decimal digits
$range = range(0,9);
$decimals = array();

foreach ($range as $a) {
    foreach ($range as $b) {
        foreach ($range as $c) {
            $decimals[] = $a.$b.$c.$c.$b.$a;
            $decimals[] = $a.$b.$c.$b.$a;
        }
        $decimals[] = $a.$b.$a;
        $decimals[] = $a.$b.$b.$a;
    }
    $decimals[] = $a.$a;
    $decimals[] = $a;
}

foreach ($decimals as $i => $n) {
    if (substr($n, 0, 1) == '0')
        unset($decimals[$i]);
}

sort($decimals);
$log->log(count($decimals).' decimals to check');

$results = array();
foreach ($decimals as $n)
{
    $b = decbin($n);
    if ($pal->isPalindrome($b))
        $results[$n] = $b;
}

print_r($results);

$log->solution(array_sum(array_keys($results)));