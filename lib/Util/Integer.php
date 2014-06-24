<?php namespace Util; 

class Integer
{
    /**
     * @param mixed $x
     * @return bool
     */
    public static function isInteger($x)
    {
        return ctype_digit(strval($x));
    }
} 