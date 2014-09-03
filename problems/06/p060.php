<?php
/**
 * Prime pair sets
 * Problem 60
 *
 * The primes 3, 7, 109, and 673, are quite remarkable. By taking any two primes and concatenating them in
 * any order the result will always be prime. For example, taking 7 and 109, both 7109 and 1097 are prime.
 * The sum of these four primes, 792, represents the lowest sum for a set of four primes with this property.
 *
 * Find the lowest sum for a set of five primes for which any two primes concatenate to produce another prime.
 *
 * The solution is: 26033 (sum of 13, 5197, 5707, 6733, 8389)
 */
$log = new \Util\Log();
$prime = \Math\Prime::getInstance('6M'); // 6M required, because 8 digits length

$upperLimit = 10000;
$primes = $prime->getPrimesTo($upperLimit);
$flippedPrimes = array_flip($prime->getPrimes());
$length = count($primes);
$log->log("searching set of first $length primes to $upperLimit");

$solutions = [];
for ($a=0; $a<$length; $a++) {
    for ($b=$a+1; $b<$length; $b++) {
        $p1 = $primes[$a];
        $p2 = $primes[$b];
        if (! areConcatenatedPrimes($p1, $p2))
            continue;
        for ($c=$b+1; $c<$length; $c++) {
            $p3 = $primes[$c];
            foreach ([$p1, $p2] as $p) {
                if (! areConcatenatedPrimes($p, $p3))
                    continue 2;
            }
            for ($d=$c+1; $d<$length; $d++) {
                $p4 = $primes[$d];
                foreach ([$p1, $p2, $p3] as $p) {
                    if (! areConcatenatedPrimes($p, $p4))
                        continue 2;
                }
                // Finding the 4 takes less than a second for primes to 1000
                // $solutions[$p1 + $p2 + $p3 + $p4] = [$p1, $p2, $p3, $p4];
                // $log->log("solution found for numbers $p1, $p2, $p3, $p4");
                for ($e=$d+1; $e<$length; $e++) {
                    $p5 = $primes[$e];
                    foreach ([$p1, $p2, $p3, $p4] as $p) {
                        if (! areConcatenatedPrimes($p, $p5))
                            continue 2;
                    }
                    $solutions[$p1 + $p2 + $p3 + $p4 + $p5] = [$p1, $p2, $p3, $p4, $p5];
                    $log->log("solution found for numbers $p1, $p2, $p3, $p4, $p5");
                }
            }
        }
    }
    if ($a % 100 == 0)
        $log->log('currently at '.round(100 * $a/$length, 2).'%');
}

ksort($solutions);
$log->log(count($solutions).' concatenatable primes found.');
print_r(reset($solutions));
$log->solution(key($solutions));

function areConcatenatedPrimes($x, $y)
{
    global $flippedPrimes;
    return (isset($flippedPrimes[$x . $y]) && isset($flippedPrimes[$y . $x]));
}