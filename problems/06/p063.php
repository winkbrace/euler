<?php
/**
 * Powerful digit counts
 *
 * The 5-digit number, 16807=7^5, is also a fifth power. Similarly, the 9-digit number, 134217728=8^9,
 * is a ninth power.
 *
 * How many n-digit positive integers exist which are also an nth power?
 *
 * The solution is: 49
 */
$log = new \Util\Log();

// first search upper limit
// since 10^n = digit length n+1, we need to search up to when strlen(9^n) < n
for ($i=2; $i<100; $i++)
{
    if (strlen(gmp_strval(gmp_pow(gmp(9), $i))) < $i)
        break;
}
$upperLimit = $i-1;
$log->log('The highest power to search is: 9^'.$upperLimit.' = '.gmp_strval(gmp_pow(gmp(9), $upperLimit)));

$found = [];
for ($i=1; $i<=$upperLimit; $i++) {
    for ($p=1; $p<=9; $p++) {
        $pow = gmp_strval(gmp_pow($p, $i));
        if (strlen($pow) == $i) {
            $found[] = "$p^$i = $pow";
        }
    }
}
print_r($found);
$log->solution(count($found));