<?php
/**
 * Convergents of e
 *
 * The square root of 2 can be written as an infinite continued fraction.
 * @see http://projecteuler.net/problem=65  (This doesnt fit in plain text)
 *
 * The infinite continued fraction can be written, √2 = [1;(2)], (2) indicates that 2 repeats ad infinitum.
 * In a similar way, √23 = [4;(1,3,1,8)].
 *
 * It turns out that the sequence of partial values of continued fractions for square roots provide the best
 * rational approximations. Let us consider the convergents for √2.
 *
 * Hence the sequence of the first ten convergents for √2 are:
 * 1, 3/2, 7/5, 17/12, 41/29, 99/70, 239/169, 577/408, 1393/985, 3363/2378, ...
 *
 * What is most surprising is that the important mathematical constant,
 * e = [2; 1,2,1, 1,4,1, 1,6,1 , ... , 1,2k,1, ...].
 *
 * The first ten terms in the sequence of convergents for e are:
 * 2, 3, 8/3, 11/4, 19/7, 87/32, 106/39, 193/71, 1264/465, 1457/536, ...
 *
 * The sum of digits in the numerator of the 10th convergent is 1+4+5+7=17.
 *
 * Find the sum of digits in the numerator of the 100th convergent of the continued fraction for e.
 *
 * (This is a lot like p057)
 * The solution is: 272
 */
$log = new \Util\Log();
$sum = new \Math\Sum();
$convergents = new \Sequence\ConvergentsForE();
$sequence = $convergents->createSequenceOfLength(100);
$n = gmp_init(1);  // numerator
$d = gmp_init($sequence[100]); // = 1  denominator
for ($i=99; $i>1; $i--) {
    $prevN = $n;
    $n = $d;
    $d = gmp_add(gmp_mul($d, $sequence[$i]), $prevN);
}
$totalNumerator = gmp_strval(gmp_add(gmp_mul(2, $d), $n));
$log->log($totalNumerator . " / ".gmp_strval($d));
$log->solution($sum->getSumOfDigits($totalNumerator));