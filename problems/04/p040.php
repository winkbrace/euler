<?php
/**
 * Champernowne's constant
 * Problem 40
 *
 * An irrational decimal fraction is created by concatenating the positive integers:
 *
 * 0.123456789101112131415161718192021...
 *
 * It can be seen that the 12th digit of the fractional part is 1.
 *
 * If dn represents the nth digit of the fractional part, find the value of the following expression.
 *
 * d1 × d10 × d100 × d1000 × d10000 × d100000 × d1000000
 *
 * Answer: 210
 */

$log = new \Util\Log();

$champ = new \Sequence\Champernowne();
$results = array(
    1 => $champ->getDigitAtPosition(1),
    10 => $champ->getDigitAtPosition(10),
    100 => $champ->getDigitAtPosition(100),
    1000 => $champ->getDigitAtPosition(1000),
    10000 => $champ->getDigitAtPosition(10000),
    100000 => $champ->getDigitAtPosition(100000),
    1000000 => $champ->getDigitAtPosition(1000000),
);
print_r($results);

$log->solution(array_product($results));