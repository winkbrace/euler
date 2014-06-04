<?php namespace Math; 

class Sum
{
    public function getSumOfDigits($string)
    {
        $digits = str_split($string);
        return array_sum($digits);
    }
}