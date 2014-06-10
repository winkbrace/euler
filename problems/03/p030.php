<?php

/**
 * Digit fifth powers
Problem 30

Surprisingly there are only three numbers that can be written as the sum of fourth powers of their digits:

1634 = 1^4 + 6^4 + 3^4 + 4^4
8208 = 8^4 + 2^4 + 0^4 + 8^4
9474 = 9^4 + 4^4 + 7^4 + 4^4

As 1 = 1^4 is not a sum it is not included.

The sum of these numbers is 1634 + 8208 + 9474 = 19316.

Find the sum of all the numbers that can be written as the sum of fifth powers of their digits.

Answer: 443839
 */

// upperlimit: 6*9^5=354294. This is the highest possible number of digits where
// sum of powers can have that number of digits.

$results = array();
for ($a=0; $a<=3; $a++)
{
    $pa = pow($a, 5);
    for ($b=0; $b<=9; $b++)
    {
        $pb = pow($b, 5);
        if ($pa + $pb > 354294)
            continue 2;
        for ($c=0; $c<=9; $c++)
        {
            $pc = pow($c, 5);
            if ($pa + $pb + $pc > 354294)
                continue 2;
            for ($d=0; $d<=9; $d++)
            {
                $pd = pow($d, 5);
                if ($pa + $pb + $pc + $pd > 354294)
                    continue 2;
                for ($e=0; $e<=9; $e++)
                {
                    $pe = pow($e, 5);
                    if ($pa + $pb + $pc + $pd + $pe > 354294)
                        continue 2;
                    for ($f=0; $f<=9; $f++)
                    {
                        $pf = pow($f, 5);
                        $sum = $pa + $pb + $pc + $pd + $pe + $pf;
                        if ($sum > 354294)
                            continue 2;

                        if ($a.$b.$c.$d.$e.$f == $sum)
                        {
                            $results[] = $sum;
                            echo PHP_EOL.$a.$b.$c.$d.$e.$f.' = '.$sum;
                        }
                    }
                }
            }
        }
    }
}

// subtract 1, because 000000 and 000001 are invalid results
echo PHP_EOL."The answer is: ".array_sum($results) - 1;