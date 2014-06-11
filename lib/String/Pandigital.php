<?php namespace String;

/**
 * Class Pandigital
 *
 * We shall say that an n-digit number is pandigital if it makes use of all the digits 1 to n exactly once;
 * for example, the 5-digit number, 15234, is 1 through 5 pandigital.
 */
class Pandigital
{
    /**
     * @param string $n
     * @return bool
     */
    public function isPandigital($n)
    {
        $n = (string) $n;
        $len = strlen($n);
        for ($i=1; $i<=$len; $i++)
        {
            if (strpos($n, (string) $i) === false)
                return false;
        }

        return true;
    }
} 