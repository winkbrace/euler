<?php require_once 'bootstrap.php';

/**
 * Largest prime factor
 * Problem 3
 *
 * The prime factors of 13195 are 5, 7, 13 and 29.
 *
 * What is the largest prime factor of the number 600851475143 ?
 */

$p = new \Math\Prime();
$primeFactors = $p->getPrimeFactorsOf(600851475143);
var_dump($primeFactors);
echo max($primeFactors);