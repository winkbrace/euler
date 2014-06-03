<?php namespace String;

class Palindrome
{
    /**
     * @param mixed $n
     * @return bool
     */
    public function isPalindrome($n)
    {
        $string = (string) $n;
        return $string == strrev($string);
    }
} 