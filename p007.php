<?php require_once 'bootstrap.php';

/**
 * 10001st prime
 * Problem 7
 * Published on Friday, 28th December 2001, 06:00 pm; Solved by 190310
 *
 * By listing the first six prime numbers: 2, 3, 5, 7, 11, and 13, we can see that the 6th prime is 13.
 * What is the 10001st prime number?
 */
$p = new \Math\Prime();
echo $p->getNthPrime(10001);