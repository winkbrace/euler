<?php namespace Sequence;

use String\Palindrome;

/**
 * Class Lychrel
 *
 * All numbers that when reversed and added do not result in a palindrome in 50 iterations.
 */
class Lychrel
{
    private $palindrome;

    /**
     * @param Palindrome $palindrome
     */
    public function __construct(Palindrome $palindrome)
    {
        $this->palindrome = $palindrome;
    }

    /**
     * @param int $n
     * @return bool
     */
    public function isLychrel($n)
    {
        $n = gmp_init($n);
        for ($i=1; $i<=50; $i++)
        {
            $n = gmp_add($n, gmp_init(ltrim(strrev(gmp_strval($n)), '0')));
            //echo "$i " . gmp_strval($n)."\n";
            if ($this->palindrome->isPalindrome(gmp_strval($n))) {
                return false;
            }
        }

        return true;
    }
}