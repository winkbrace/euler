<?php

/**
 * Number spiral diagonals
Problem 28

Starting with the number 1 and moving to the right in a clockwise direction a 5 by 5 spiral is formed as follows:

21 22 23 24 25
20  7  8  9 10
19  6  1  2 11
18  5  4  3 12
17 16 15 14 13

It can be verified that the sum of the numbers on the diagonals is 101.

What is the sum of the numbers on the diagonals in a 1001 by 1001 spiral formed in the same way?

Answer: 669171001
 */

/**
 * 0 => 2*0 = 1     f(1) = 1
 * 1 => 2*1 = 2     f(3) = 1 + 3 + 5 + 7 + 9 = 1 + (1+2) + (1+2*2) + (1+3*2) + (1+4*2) = 1 + 4*1 + (1+2+3+4) * 2 = 1 + 4 + 10 * 2
 * 2 => 2*2 = 4     f(5) = f(1) + f(3) + {13 + 17 + 21 + 25 = 9+4 + 9+4*2 .. = 4*9 + (1+2+3+4) * 4 }
 * 3 => 2*3 = 6     f(7) = f(1) + f(3) + f(5) + { 25+6 + 25+12 .. = 4*25 + 10*6 }
 *
 * 1 + 4 steps of 2 + 4 steps of 4 + 4 steps of 6
 * ribbe = n => f(n) = 4 * (n-2)^2 + 10 * (n-1) + alle voorgaande
 * f(1) = 1
 * f(3) = 25 (+24)
 * f(5) = 101 (+76)
 * f(7) = 261 (+160) .. hmm.. ik zie hier even geen verband..
 */

//function calculate($n)
//{
//    if ($n == 1)
//        return 1;
//
//    return 4 * pow($n-2, 2) + 10*($n-1) + calculate($n-2);
//}
//
//for ($n=1; $n<=9; $n+=2)
//{
//    echo PHP_EOL."f($n) = ".calculate($n);
//}
//
//echo PHP_EOL."f(1001) = ".calculate(1001); // note: requires xdebug.max_nesting_level = 1000

// or simply in a loop <_<
$sum = 1;
for ($n=3; $n<=1001; $n+=2)
    $sum += 4 * pow($n-2, 2) + 10*($n-1);

echo $sum;