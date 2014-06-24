<?php namespace Util;

class ArrayHelper
{
    /**
     * @param array $array
     * @param int $n
     */
    public static function incrementKeys(&$array, $n = 1)
    {
        for ($i=0; $i<$n; $i++)
            array_unshift($array, null);
        for ($i=0; $i<$n; $i++)
            unset($array[$i]);
    }

    /**
     * @param array $array
     * @return array
     */
    public static function getAllDifferences($array)
    {
        $diff = array();

        foreach ($array as $i => $a)
        {
            for ($j = $i+1; $j<count($array); $j++)
            {
                $b = $array[$j];
                $diff[$b - $a][] = [$a, $b];
            }
        }

        return $diff;
    }
}
