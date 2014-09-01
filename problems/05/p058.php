<?php
/**
 * Spiral primes
 *
 * Starting with 1 and spiralling anticlockwise in the following way,
 * a square spiral with side length 7 is formed.
 *
 * 37 36 35 34 33 32 31
 * 38 17 16 15 14 13 30
 * 39 18  5  4  3 12 29
 * 40 19  6  1  2 11 28
 * 41 20  7  8  9 10 27
 * 42 21 22 23 24 25 26
 * 43 44 45 46 47 48 49
 *
 * It is interesting to note that the odd squares lie along the bottom right diagonal, but what is more
 * interesting is that 8 out of the 13 numbers lying along both diagonals are prime; that is, a ratio of
 * 8/13 ≈ 62%.
 *
 * If one complete new layer is wrapped around the spiral above, a square spiral with side length 9 will
 * be formed. If this process is continued, what is the side length of the square spiral for which the
 * ratio of primes along both diagonals first falls below 10%?
 *
 * The solution is: 26241
 * (script duration: 30 minutes (before a few tweaks, but now probably still about 20 minutes))
 */
$log = new \Util\Log();
$prime = \Math\Prime::getInstance();

/*
1                        0           = 1
3 5 7 9       = 4 * +2   1 2 3 4     = 2x - 1^2 + 2
13 17 21 25   = 4 * +4   5 6 7 8     = 4x - 3^2 + 2
31 37 43 49   = 4 * +6   9 10 11 12  = 6x - 5^2 + 2
57                       13          = 8x - 7^2 + 2 = ax - (a-1)^2 + 2, a = 2 * ceil(x/4)
*/

$spiral = new \Sequence\SpiralSquare();

$ratio = 1;
$primesCount = 0;
$side = 1;
$length = 0;
while ($ratio > 0.1)
{
    $side += 2;
    $length += 4;

    for ($i=1; $i<=4; $i++)
    {
        $next = $spiral->next();
        if ($prime->isPrime($next))
            $primesCount++;
    }

    $ratio = $primesCount / $length;

    if ($length % 400 == 1)
        $log->log("spiral square with side $side has $ratio primes ratio in the diagonals");
}
$log->log("When the sequence reached length $length the primes ratio became below 10% at side length $side.");
$log->solution($side);