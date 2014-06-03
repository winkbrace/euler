<?php

/**
 * Largest palindrome product
 * Problem 4
 *
 * A palindromic number reads the same both ways. The largest palindrome made from the product of
 * two 2-digit numbers is 9009 = 91 × 99.
 *
 * Find the largest palindrome made from the product of two 3-digit numbers.
 */

$p = new \String\Palindrome();

$palindromes = array();
for ($i = 999; $i > 0; $i--)
{
    for ($j = $i - 1; $j > 0; $j--)
    {
        if ($p->isPalindrome($i * $j))
        {
            $palindromes[] = $i * $j;
            //echo "$i * $j = ".($i * $j).PHP_EOL;
        }
    }
}

rsort($palindromes);
echo $palindromes[0];