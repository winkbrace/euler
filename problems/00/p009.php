<?php

/**
 * Special Pythagorean triplet
 * Problem 9
 *
 * A Pythagorean triplet is a set of three natural numbers, a < b < c, for which,
 * a^2 + b^2 = c^2
 *
 * For example, 3^2 + 4^2 = 9 + 16 = 25 = 5^2.
 *
 * There exists exactly one Pythagorean triplet for which a + b + c = 1000.
 * Find the product abc.
 */

for ($a = 3; $a < 500; $a++)
{
    for ($b=$a+1; $b < 500; $b++)
    {
        $c = sqrt(pow($a, 2) + pow($b, 2));
        if ($c == (int) $c && $a + $b + $c == 1000)
            die("$a * $b * $c = ".$a * $b * $c);
    }
}