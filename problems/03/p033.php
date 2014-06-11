<?php

use String\CommonDigits;

/**
 * Digit canceling fractions
 * Problem 33
 *
 * The fraction 49/98 is a curious fraction, as an inexperienced mathematician in attempting to simplify it may
 * incorrectly believe that 49/98 = 4/8, which is correct, is obtained by cancelling the 9s.
 *
 * We shall consider fractions like, 30/50 = 3/5, to be trivial examples.
 *
 * There are exactly four non-trivial examples of this type of fraction, less than one in value, and containing
 * two digits in the numerator and denominator.
 *
 * If the product of these four fractions is given in its lowest common terms, find the value of the denominator.
 *
 * Answer: 100
 */

$fractions = array();
// first collect the 1/1 digit fractions
for ($n=1; $n<10; $n++)
{
    for ($d=$n+1; $d<10; $d++)
    {
        $fractions[(int) (1000000 * round($n/$d, 6))][] = "$n/$d";
    }
}

// then only add 2/2 digit fractions that also have a 1/1 representative
for ($n=10; $n<100; $n++)
{
    for ($d=$n+1; $d<100; $d++)
    {
        if (! empty($fractions[(int) (1000000 * round($n/$d, 6))]))
            $fractions[(int) (1000000 * round($n/$d, 6))][] = "$n/$d";
    }
}

//print_r($fractions);
//die;

$results = array();

foreach ($fractions as $group)
{
    for ($i=0; $i<count($group); $i++)
    {
        list($n, $d) = explode('/', $group[$i]);
        if (($digit = CommonDigits::getCommonDigit($n, $d)) !== false)
        {
            list($n, $d) = CommonDigits::removeCommonDigits($n, $d, $digit);
            // if the newly created fraction exists in this group, we have found a match!
            if (in_array("$n/$d", $group))
                $results["$n/$d"] = $group[$i];
        }
    }
}

print_r($results);

/*
4 1 1 2    8     1
-*-*-*- = --- = ---   => denominator = 100
8 4 5 5   800   100
*/
$sum = array('n' => 1, 'd' => 1);
foreach (array_keys($results) as $val)
{
    list($n, $d) = explode('/', $val);
    $sum['n'] *= $n;
    $sum['d'] *= $d;
}

$f = new \Math\Fraction();
list($n, $d) = $f->simplify($sum['n'], $sum['d']);
echo PHP_EOL."$n/$d => The answer is: $d";