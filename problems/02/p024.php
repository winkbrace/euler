<?php

/**
 * Lexicographic permutations
 * Problem 24
 *
 * A permutation is an ordered arrangement of objects. For example, 3124 is one possible permutation of the digits 1, 2, 3 and 4. If all of the permutations are listed numerically or alphabetically, we call it lexicographic order. The lexicographic permutations of 0, 1 and 2 are:
 *
 * 012   021   102   120   201   210
 *
 * What is the millionth lexicographic permutation of the digits 0, 1, 2, 3, 4, 5, 6, 7, 8 and 9?
 */

// this really looks like it needs recursion
// and I should use bitwise ANDs and 10bits!

bits_solution();

/**
 * this bits solution took
 */
function bits_solution()
{
    $count = 0;

    $pool = bindec('1111111111');
    // bleh etc
}

/**
 * this array solution took 50 seconds:
 */
function array_solution()
{
    $count = 0;

    $pool = range(0,9);

    $poolA = $pool;
    foreach ($poolA as $a)
    {
        $poolB = array_diff($pool, array($a));
        foreach ($poolB as $b)
        {
            $poolC = array_diff($pool, array($a, $b));
            foreach ($poolC as $c)
            {
                $poolD = array_diff($pool, array($a, $b, $c));
                foreach ($poolD as $d)
                {
                    $poolE = array_diff($pool, array($a, $b, $c, $d));
                    foreach ($poolE as $e)
                    {
                        $poolF = array_diff($pool, array($a, $b, $c, $d, $e));
                        foreach ($poolF as $f)
                        {
                            $poolG = array_diff($pool, array($a, $b, $c, $d, $e, $f));
                            foreach ($poolG as $g)
                            {
                                $poolH = array_diff($pool, array($a, $b, $c, $d, $e, $f, $g));
                                foreach ($poolH as $h)
                                {
                                    $poolI = array_diff($pool, array($a, $b, $c, $d, $e, $f, $g, $h));
                                    foreach ($poolI as $i)
                                    {
                                        $poolJ = array_diff($pool, array($a, $b, $c, $d, $e, $f, $g, $h, $i));
                                        $j = reset($poolJ);
                                        if (++$count == 1000000)
                                            break(9);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    echo $a.$b.$c.$d.$e.$f.$g.$h.$i.$j.PHP_EOL;
}
