<?php
/**
 * It is possible to show that the square root of two can be expressed as an infinite continued fraction.
 * √ 2 = 1 + 1/(2 + 1/(2 + 1/(2 + ... ))) = 1.414213...
 *
 * By expanding this for the first four iterations, we get:
 *
 * 1: 1 + 1/2 = 3/2 = 1.5
 * 2: 1 + 1/(2 + 1/2) = 7/5 = 1.4
 * 3: 1 + 1/(2 + 1/(2 + 1/2)) = 17/12 = 1.41666...
 * 4: 1 + 1/(2 + 1/(2 + 1/(2 + 1/2))) = 41/29 = 1.41379...
 *
 * The next three expansions are 99/70, 239/169, and 577/408, but the eighth expansion, 1393/985, is the
 * first example where the number of digits in the numerator exceeds the number of digits in the denominator.
 *
 * In the first one-thousand expansions, how many fractions contain a numerator with more digits than denominator?
 */
$log = new \Util\Log();
$fraction = new \Math\Fraction();

// we can forget about the 1 + , because it is the same as numerator + denominator / denominator, which means
// we only need to know denominator and numerator of the fractional part.

$x = 3;
$y = 1 / (2 + 1 / (2 + 1 / 2));   // 1 / (x/y) = y/x -> reverses den and num
// 5 / 2
// 1 / (5/2) = 2/5
// 10/5 + 2/5 = 12/5
// 1 / (12/5) = 5/12   .. dus 2/5 -> 5/12 = den becomes num and num + 2*den = den

$num = gmp_init(1);
$den = gmp_init(2);
$count = 0;
for ($i=2; $i<=1000; $i++)
{
    $prevNum = $num;
    $num = $den;
    $den = gmp_add(gmp_mul(2, $den), $prevNum);
    list($simpleNum, $simpleDen) = $fraction->simplify(gmp_add($num, $den), $den);
    if (strlen($simpleNum) > strlen($simpleDen))
    {
        $log->log($i . ': ' . $simpleNum . ' / ' . $simpleDen);
        $count++;
    }
}

$log->solution($count);