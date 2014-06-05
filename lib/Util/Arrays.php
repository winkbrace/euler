<?php namespace Util;

class Arrays
{
    public static function incrementKeys(&$array, $n = 1)
    {
        for ($i=0; $i<$n; $i++)
            array_unshift($array, null);
        for ($i=0; $i<$n; $i++)
            unset($array[$i]);
    }
}
