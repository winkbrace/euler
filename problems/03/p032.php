<?php

/**
 * Pandigital products
Problem 32

 * We shall say that an n-digit number is pandigital if it makes use of all the digits 1 to n exactly once;
 * for example, the 5-digit number, 15234, is 1 through 5 pandigital.
 *
 * The product 7254 is unusual, as the identity, 39 × 186 = 7254, containing multiplicand, multiplier,
 * and product is 1 through 9 pandigital.

Find the sum of all products whose multiplicand/multiplier/product identity can be written as a 1 through 9 pandigital.
HINT: Some products can be obtained in more than one way so be sure to only include it once in your sum.

Answer:
45228
 */

$limit = (int) sqrt(987654321);  // 31426

$pandigital = new \String\Pandigital();

$results = array();
for ($i=1; $i<=$limit; $i++)
{
    for ($j=$i+1; $j<=$limit; $j++)
    {
        $p = $i * $j;
        $string = $i.$j.$p;
        if (strlen($string) > 9)
            continue 2;
        if (strlen($string) == 9 && $pandigital->isPandigital($string))
            $results[$p] = 1;
    }
}

print_r(array_keys($results));
echo array_sum(array_keys($results));