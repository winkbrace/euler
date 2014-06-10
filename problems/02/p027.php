<?php

/**
 * Quadratic primes
 * Problem 27
 *
 * Euler discovered the remarkable quadratic formula:
 *
 * n² + n + 41
 *
 * It turns out that the formula will produce 40 primes for the consecutive values n = 0 to 39.
 * However, when n = 40, 402 + 40 + 41 = 40(40 + 1) + 41 is divisible by 41, and certainly when n = 41, 41² + 41 + 41
 * is clearly divisible by 41.
 *
 * The incredible formula  n² − 79n + 1601 was discovered, which produces 80 primes for the consecutive values
 * n = 0 to 79. The product of the coefficients, −79 and 1601, is −126479.
 *
 * Considering quadratics of the form:
 *
 * n² + an + b, where |a| < 1000 and |b| < 1000
 *
 * where |n| is the modulus/absolute value of n
 * e.g. |11| = 11 and |−4| = 4
 *
 * Find the product of the coefficients, a and b, for the quadratic expression that produces the maximum number of
 * primes for consecutive values of n, starting with n = 0.
 *
 * Answer: -61 * 971 = -59231
 */

$p = new \Math\Prime();

// My hypotheses is that only primes need to be checked. And that proved to be correct.
$primes = $p->getPrimesTo(1000);
$numbersToCheck = array();
foreach ($primes as $n) {
    array_unshift($numbersToCheck, -$n);
    $numbersToCheck[] = $n;
}

$longest = ['length' => 0, 'a' => 0, 'b' => 0];

foreach ($numbersToCheck as $a)
{
    foreach ($numbersToCheck as $b)
    {
        for ($x=1; $x<=100; $x++)
        {
            $y = pow($x, 2) + ($a * $x) + $b;
            if (! $p->isPrime($y))
            {
                if ($x - 1 > $longest['length'])
                {
                    $longest = ['length' => $x - 1, 'a' => $a, 'b' => $b];
                    echo "x^2 + ".$a."x + $b => $x: $y is first non prime".PHP_EOL;
                }
                break;
            }
        }
    }
}

echo "the answer is: a * b = ".$longest['a'] * $longest['b'];
